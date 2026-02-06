// Polyfill to integrate jspreadsheet and jquery
if (typeof (jQuery) !== 'undefined') {
    (function ($) {
        $.fn.jspreadsheet = $.fn.jexcel = function (mixed) {
            let container = $(this).get(0);
            if (!container.jspreadsheet) {
                return jspreadsheet($(this).get(0), arguments[0]);
            } else {
                if (typeof (arguments[0]) == 'number') {
                    let n = arguments[0];
                    let i = 2;
                } else {
                    let n = 0;
                    let i = 1;
                }
                return container.jspreadsheet[n][mixed].apply(
                    container.jspreadsheet[n],
                    Array.prototype.slice.call(arguments, i)
                );
            }
        };
    })(jQuery);
}

$(document).ready(function () {
    window.ctrlFormInput = new CtrlFormInput();
    window.ctrlFormInput.init();
});

let NEGATIVE = function (v) {
    return window.ctrlFormInput.negative(v);
}

// own offset function
let OFFSET = function (cellName, rows, cols, height, width) {
    // Ambil instance spreadsheet (sesuaikan ID-nya)
    var instance = document.getElementById('spreadSheetInput').jspreadsheet;

    // Konversi nama sel (misal 'A1') menjadi koordinat [x, y]
    var coords = jspreadsheet.helpers.getCoordsFromColumnName(cellName);
    var startX = parseInt(coords[0]) + (cols || 0);
    var startY = parseInt(coords[1]) + (rows || 0);

    // Default height dan width adalah 1 jika tidak diisi
    height = height || 1;
    width = width || 1;

    if (height === 1 && width === 1) {
        return instance.getValueFromCoords(startX, startY);
    } else {
        // Jika range, ambil data dalam bentuk array (perlu penanganan tambahan di cell)
        return instance.getData(false); // Sederhananya return raw data
    }
};

class HyperFormulaClass {
    hfInstance;
    sheetName;
    sheetId;
    datasourceInput;

    constructor() {
        //console.log("test");
    }

    setDataSource(datasourceInput) {
        this.datasourceInput = datasourceInput;
    }

    initHyperFormula() {
        // Konfigurasi HyperFormula
        this.hfInstance = HyperFormula.buildEmpty({
            licenseKey: 'gpl-v3', // Lisensi open source
        });

        // Tambahkan sheet bernama 'Input' ke engine
        this.sheetName = this.hfInstance.addSheet('Input');
        this.sheetId = this.hfInstance.getSheetId(this.sheetName);
        // Seed HyperFormula with initial data
        // this.hfInstance.setCellContents({ sheet: this.sheetId, row: 0, col: 0 }, this.datasourceInput);
        // Masukkan semua data awal ke HyperFormula
        this.hfInstance.setSheetContent(this.sheetId, this.datasourceInput);
        // this.syncFormulaResults();
    }

    syncFormulaResults(instanceJspreadSheet, x, y, value) {
        // console.log(x);
        // console.log(y);
        // console.log(value);
        this.hfInstance.setCellContents({
            col: parseInt(x),
            row: parseInt(y),
            sheet: this.sheetId
        }, [[value]]);
        // Ambil semua hasil kalkulasi (berupa array 2D) dari HyperFormula
        const calculatedValues = this.hfInstance.getSheetValues(this.sheetId);
        // console.log(calculatedValues);

        // Matikan event sementara agar tidak terjadi looping (infinite loop)
        instanceJspreadSheet.ignoreEvents = true;
        instanceJspreadSheet.ignoreHistory = true;

        // this line code have purpose to collect all raw formula
        calculatedValues.forEach((row, r) => {
            row.forEach((value, c) => {
                if (value != '#DIV/0!'
                    && value != '#VALUE!'
                    && value != '#REF!'
                    && value != '#NUM!'
                    && value != '#CYCLE!'
                    && value != '#ERROR!'
                    && value != '#NAME?') {
                    // Ambil formula asli dari sel (misal: "=SUM(A1:B1)")
                    const rawValue = instanceJspreadSheet.getValueFromCoords(c, r, false);
                    // Jika sel tersebut memang berisi formula, update dataFormula array
                    if (rawValue && rawValue.toString().startsWith('=')) {

                    }
                } else {

                }
            });
        });

        // const addressA1Notation = hfInstance.simpleCellAddressFromString('A1', sheetId);
        // console.log(addressA1Notation);
        let address = { sheet: this.sheetId, col: parseInt(x), row: parseInt(y) };
        // console.log(address);
        value = this.hfInstance.getCellValue(address);
        instanceJspreadSheet.setValueFromCoords(x, y, value, true); // true = force update without triggering onchange again
        // Hidupkan kembali event
        instanceJspreadSheet.ignoreEvents = false;
        instanceJspreadSheet.ignoreHistory = false;
        return value;
    }
}

class CtrlFormInput extends HyperFormulaClass {
    observerPageContentIner;
    worksheetInput;
    modalCreateColumn;
    dropDownPic;
    dropDownLevel;
    dropDownSatuan;
    flagAddRow;
    datasourceInput = [
        ['No', 'Data Dibutuhkan', 'Satuan', 'Level', 'TW I', 'TW II', 'TW III', 'TW IV'],
        ['1', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Bebas Hukuman Disiplin', '%', 'DMB'],
        ['2', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Mencapai/ Melebihi Target Kinerja', '%', 'DMB'],
    ];
    tempSatuanBeforeChange;
    tempLevelBeforeChange;
    isChangeByProgram;

    // The constructor method is automatically called when a new object is created
    constructor() {
        // call and setup parent class
        super();
        super.setDataSource(this.datasourceInput);
        super.initHyperFormula();
    }
    init() {
        this.initKendo();
        this.initModal();
        this.initSelectize();
        // before init spreadsheet, should call backend first to get dataSource and set it on atrribute class, line code should be here
        this.initSpreedSheetInput();
        this.initObserverPageContentIner();
        this.callBe(this.datasourceInput);
    }
    initObserverPageContentIner() {
        this.observerPageContentIner = new ResizeObserver(entries => {
            for (let entry of entries) {
                // console.log('Elemen berubah ukuran!', entry.contentRect.width);
                //-------------------------change table jspreadsheet wrapper dynamic
                $('.jss_content').attr("style", "width:" + (entry.contentRect.width - 30) + "px; overflow-x: auto; ");

                //-------------------------change each column to same size
                // // Ambil lebar container (dikurangi sedikit untuk padding/scrollbar jika ada)
                // const containerWidth = entry.contentRect.width - 100;
                // // Hitung jumlah kolom
                // const columnCount = this.worksheetInput.options.columns.length;
                // // Hitung lebar rata tiap kolom
                // const equalWidth = Math.floor(containerWidth / columnCount);
                // // Terapkan ke semua kolom secara programatik
                // for (let i = 0; i < columnCount; i++) {
                //     this.worksheetInput.setWidth(i, equalWidth);
                // }
            }
        });
        this.observerPageContentIner.observe($('#wrapper_content')[0]);
    }
    initKendo() {
        $("#tahun").kendoDatePicker({
            // Sets the format of the input field
            format: "yyyy",
            // The view that is initially shown when the calendar opens
            start: "decade",
            // The most detailed view the user can select (prevents navigating to month/day views)
            depth: "decade",
            value: new Date()
        });
        // Change the default icon to a different one (e.g., k-i-calendar-date)
        $(".k-icon").removeClass("k-i-calendar").addClass('k-i-calendar-date');

        var $search = $('#search');
        if ($search.length) {
            var data = [
                { text: "Deviasi Ekspor Impor", value: "1" },
                { text: "NKO", value: "2" },
                { text: "Capaian", value: "3" }
            ];
            $search.kendoDropDownList({
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                index: 0
            });
        }
    }
    initModal() {
        this.modalCreateColumn = UIkit.modal($('#modal_overflow'));
    }
    initSelectize() {
        var self = this;
        // init dropdown pic
        this.dropDownPic = $('#drop_pic').selectize({
            plugins: {
                'remove_button': {
                    label: ''
                }
            },
            options: [
                { id: 1, text: 'DMEP' },
                { id: 2, text: 'DMOT' },
                { id: 3, text: 'DMEP' },
                { id: 4, text: 'DMBS' },
            ],
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            render: {
                option: function (data, escape) {
                    return '<div class="option">' +
                        '<span class="title">' + escape(data.text) + '</span>' +
                        '</div>';
                },
                item: function (data, escape) {
                    return '<div class="item">' + escape(data.text) + '</div>';
                }
            },
            create: function (input) {
                return { id: 123, text: input };
            },
            onDropdownOpen: function ($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function () {
                            $dropdown.css({ 'margin-top': '0' })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            },
            onDropdownClose: function ($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function () {
                            $dropdown.css({ 'margin-top': '' })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            }
        });

        // init dropdown level
        this.dropDownLevel = $('#drop_level').selectize({
            plugins: {
                'remove_button': {
                    label: ''
                }
            },
            options: [
                { id: 1, text: 'IKSP' },
                { id: 2, text: 'IKSK-2' },
                { id: 3, text: 'IKSK-3' },
                { id: 4, text: 'IKSK-4' },
            ],
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            render: {
                option: function (data, escape) {
                    return '<div class="option">' +
                        '<span class="title">' + escape(data.text) + '</span>' +
                        '</div>';
                },
                item: function (data, escape) {
                    return '<div class="item">' + escape(data.text) + '</div>';
                }
            },
            create: function (input) {
                return { id: 123, text: input };
            },
            onDropdownOpen: function ($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function () {
                            $dropdown.css({ 'margin-top': '0' })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            },
            onDropdownClose: function ($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function () {
                            $dropdown.css({ 'margin-top': '' })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            }
        });

        // init dropdown satuan
        this.dropDownSatuan = $('#drop_satuan').selectize({
            plugins: {
                'remove_button': {
                    label: ''
                }
            },
            options: [
                { id: 1, text: 'MMSTB' },
                { id: 2, text: 'TCF' },
                { id: 3, text: 'BBOE' },
                { id: 4, text: 'km2' },
                { id: 5, text: 'sumur' },
                { id: 6, text: 'Jumlah Rekom POD I' },
                { id: 7, text: 'Jumlah Evaluasi' },
                { id: 8, text: 'Jumlah Rekomendasi' },
                { id: 9, text: 'Dokumen/SR' },
                { id: 10, text: 'Ruas' },
                { id: 11, text: 'ton/d' },
                { id: 12, text: 'mton' },
                { id: 13, text: 'RIBU BCPD' },
                { id: 14, text: 'RIBU BOPD' },
                { id: 15, text: 'JUTA TON' },
                { id: 16, text: 'Tingkat Kepuasan' },
                { id: 17, text: 'Jumlah Penandasahan' },
                { id: 18, text: 'Level' },
                { id: 19, text: 'Nilai SAKIP' },
                { id: 20, text: 'Jumlah Komponen' },
                { id: 21, text: '%' }
            ],
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            render: {
                option: function (data, escape) {
                    return '<div class="option">' +
                        '<span class="title">' + escape(data.text) + '</span>' +
                        '</div>';
                },
                item: function (data, escape) {
                    return '<div class="item">' + escape(data.text) + '</div>';
                }
            },
            create: function (input) {
                return { id: 123, text: input };
            },
            onDropdownOpen: function ($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function () {
                            $dropdown.css({ 'margin-top': '0' })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            },
            onDropdownClose: function ($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function () {
                            $dropdown.css({ 'margin-top': '' })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            }
        });

        $('#jenis_input').on('change', function () {
            // This function will execute every time the selected option changes
            var selectedValue = $(this).val();
            var selectedText = $(this).find('option:selected').text();
            console.log('Selected Value: ' + selectedValue);
            console.log('Selected Text: ' + selectedText);
            if (selectedText == 'Input') {
                self.hideSelectize('all');
            } else if (selectedText == 'Dropown PIC') {
                self.showSelectize('pic');
            } else if (selectedText == 'Dropown Level PIC') {
                self.showSelectize('level');
            } else {
                self.showSelectize('satuan');
            }
        });
        // default hide all
        this.hideSelectize('all');
    }
    hideSelectize(elName) {
        if (elName == 'all') {
            // hide selectize
            $('#wrapper_pic').hide();
            // hide selectize
            $('#wrapper_level').hide();
            // hide selectize
            $('#wrapper_satuan').hide();
        }
    }
    showSelectize(elName) {
        if (elName == 'pic') {
            $('#wrapper_pic').show();
            $('#wrapper_level').hide();
            $('#wrapper_satuan').hide();
        } else if (elName == 'level') {
            $('#wrapper_pic').hide();
            $('#wrapper_level').show();
            $('#wrapper_satuan').hide();
        } else if (elName == 'satuan') {
            $('#wrapper_pic').hide();
            $('#wrapper_level').hide();
            $('#wrapper_satuan').show();
        }
    }
    setDataSource(datasourceInput) {
        this.datasourceInput = datasourceInput;
    }
    initSpreedSheetInput() {
        var self = this;
        // const syncFormulaResults = () => super.syncFormulaResults(this.worksheetInput, 0, 0, 0);
        var parentWidth = $("#spreadSheetInput").parent().width();
        // Create own formula
        formula.setFormula({ NEGATIVE });
        formula.setFormula({ OFFSET });
        // jspreadsheet create worksheet
        this.worksheetInput = $('#spreadSheetInput').jspreadsheet({
            toolbar: false,
            worksheets: [{
                data: this.datasourceInput,
                worksheetName: 'test1',
                worksheetId: '0',
                columnResize: false,
                tableWidth: parentWidth - 30,
                tableOverflow: true,
                filters: false,
                columnSorting: false,
                columnDrag: false,
                allowInsertRow: true,
                allowDeleteRow: true,
                columns: [
                    { type: 'text', width: 50, wordWrap: true },
                    { type: 'text', width: 420, wordWrap: true },
                    { type: 'dropdown', width: '120px', source: ['Satuan', '%', 'BBL', 'MMSCFD'], filter: this.dropdownFilter },
                    { type: 'dropdown', width: '120px', source: ['Level', 'DMB', 'DMO', 'DMOP'], filter: this.dropdownFilter },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                ],
            }],
            onload: function (instance) {
                self.setupBehaviourCell(instance);
            },
            onbeforeinsertrow: function () {
                if (self.flagAddRow) {
                    return true;
                }
                return false;
            },
            onselection: function (instance, x1, y1, x2, y2) {
                // console.log("x1 : " + x1 + " y1 : " + y1 + " x2 : " + x2 + " y2 : " + y2);
                var cellName = jspreadsheet.helpers.getCellNameFromCoords(x1, y1);
                $('#formula_editor').val(self.worksheetInput.getValue(cellName));
                // its mean header column E clicked
                if (x2 == 4 && y2 > 0) {
                    // instance.resetSelection();
                    return false;
                }
                // its mean column E clicked on row 0
                if (x1 == 4 && y1 == 0) {
                    self.modalCreateColumn.show();
                }
            },
            contextMenu: function () {
                return false;
            },
            onbeforechange: function (instance, cell, x, y, value) {
                // -----------------------handle dropdown--------------------------
                // 1. Ambil konfigurasi kolom berdasarkan indeks x
                var columnConfig = instance.options.columns[x];
                self.tempSatuanBeforeChange = structuredClone(self.datasourceInput[y][x]);
                self.tempLevelBeforeChange = structuredClone(self.datasourceInput[y][x]);
                // 2. Cek apakah tipe kolom tersebut adalah 'dropdown'
                if (columnConfig.type === 'dropdown') {
                    if (value == '') {
                        return false; // Cancel the change
                    }
                }
            },
            onchange: function (instance, cell, x, y, value) {
                // x is column, y is row
                var cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y, value);
                // -----------------------handle dropdown--------------------------
                var columnConfig = instance.options.columns[x];
                // 2. Cek apakah tipe kolom tersebut adalah 'dropdown', dan kembalikan nilai seperti semula bila value adalah empty/null/''
                if (columnConfig.type === 'dropdown') {
                    // ambil row paling atas di colum tersebut, untuk mendeteksi apakah select adalah satuan atau level
                    var valCustomHeader = self.worksheetInput.getValue(jspreadsheet.helpers.getCellNameFromCoords(x, 0));
                    if (valCustomHeader == 'Satuan') {
                        if (self.tempSatuanBeforeChange != value) {
                            if (value != false) {
                                // console.log('New change on cell ' + cellName + ' with coordinate: ' + x + ',' + y + ' from: ' + self.tempSatuanBeforeChange + ' to: ' + value);
                                // instance.setValueFromCoords(x, y, value, true);
                            } else {
                                // console.log('Before change on cell ' + cellName + ' with coordinate: ' + x + ',' + y + ' from: ' + value + ' to: ' + self.tempSatuanBeforeChange);
                                instance.setValueFromCoords(x, y, self.tempSatuanBeforeChange, true);
                            }
                        }
                    } else if (valCustomHeader == 'Level') {
                        if (self.tempLevelBeforeChange != value) {
                            if (value != false) {
                                // instance.setValueFromCoords(x, y, value, true);
                            } else {
                                instance.setValueFromCoords(x, y, self.tempLevelBeforeChange, true);
                            }
                        }
                    }
                }

                // ------------------------try with builtin jspreadsheet first, then formula.js if fail, if formula not exist or error then using hyperformula
                // Recalculate if formula entered
                if (typeof value === 'string' && value.startsWith('=')) {
                    // try with jspreadsheet
                    let result = instance.executeFormula(value);
                    if (result != null && !Error.isError(result)) {
                        console.log("trying with builtin jspreadsheet success " + result);
                        return result;
                    }
                    // try with formula.js
                    result = self.evaluateFormula(value, instance);
                    if(result != '#UNSUPPORTED'){
                        console.log("builtin jspreadsheet fail, trying with formulajs success " + result);
                        instance.setValueFromCoords(x, y, result, true); // true = force update without triggering onchange again
                    } else {
                        // final fallback lets try with hyperformula
                        result = HyperFormulaClass.prototype.syncFormulaResults.call(self, instance, x, y, value);
                        console.log("formulajs failed, trying with hyperformula success " + result);
                    }
                    // should be try with backend if formula.js and hyperformula not support target formula
                    // line code should be here
                }
            },
            onafterchanges: function () {

            }
        })[0];
    }
    evaluateFormula(formula, instance) {
        try {
            if (!formula.startsWith('=')) return formula; // Not a formula

            // Remove '='
            const expr = formula.substring(1).trim();

            // Handle NOW()
            if (/^NOW\(\)$/i.test(expr)) {
                return formulajs.NOW().toLocaleString();
            }

            // Handle SUM(A1:A3) or SUM(1,2,3)
            const sumMatch = expr.match(/^SUM\((.+)\)$/i);
            if (sumMatch) {
                const args = sumMatch[1].split(',').map(arg => {
                    arg = arg.trim();
                    // If it's a cell reference like A1
                    const cellRef = arg.match(/^([A-Z]+)(\d+)$/i);
                    if (cellRef) {
                        const colIndex = cellRef[1].charCodeAt(0) - 65; // 'A' -> 0
                        const rowIndex = parseInt(cellRef[2], 10) - 1; // 1-based to 0-based
                        return parseFloat(instance.getValueFromCoords(colIndex, rowIndex)) || 0;
                    }
                    return parseFloat(arg) || 0;
                });
                return formulajs.SUM.apply(null, args);
            }

            return '#UNSUPPORTED';
        } catch (e) {
            return '#ERROR';
        }
    }
    setupBehaviourCell(instance) {
        //----------------------set behaviour cell
        // Example: Loop through 8 columns (A-H) and 3 rows (1-3)
        const numCols = this.worksheetInput.options.columns.length - 1;
        const numRows = this.worksheetInput.options.data.length;

        for (let i = 0; i <= numCols; i++) {
            // Convert 0, 1, 2 to 'A', 'B', 'C'
            let colLetter = String.fromCharCode(65 + i);
            for (let j = 1; j <= numRows; j++) {
                let cellCoord = colLetter + j; // A1, A2... B1...
                // console.log(cellCoord);
                this.worksheetInput.setReadOnly(cellCoord, true);
                this.worksheetInput.setStyle(cellCoord, 'color', '#363434', true);
                if (j == 1) {
                    this.worksheetInput.setStyle(cellCoord, 'background-color', 'yellow', true);
                } else if (i < 2 && j >= 2) {
                    this.worksheetInput.setStyle(cellCoord, 'background-color', '#eeeeee', true);
                } else if (i == 2 && j != 1) {
                    this.worksheetInput.setReadOnly(cellCoord, false);
                    this.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    this.worksheetInput.setValue(cellCoord, '%');
                } else if (i == 3 && j != 1) {
                    this.worksheetInput.setReadOnly(cellCoord, false);
                    this.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    this.worksheetInput.setValue(cellCoord, 'DMB');
                } else if (i >= 4 && j != 1) {
                    this.worksheetInput.setReadOnly(cellCoord, false);
                    this.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    // change column to drop down
                    // this.worksheetInput.options.columns[i].type = 'dropdown';
                    // this.worksheetInput.options.columns[i].source = ['Pilihan A', 'Pilihan B', 'Pilihan C'];
                    // 2. Refresh tampilan (paksa pembuatan ulang DOM editor)
                    // this.worksheetInput.setData(this.worksheetInput.getData());
                }
            }
        }
    }
    addColumn() {
        this.modalCreateColumn.show();
        //---------------add new column with type dropdown
        // case (1, 3, true) column and row always start on index 0, so this mean: 1 -> add 1 column, 3 -> target column D, false -> add column after target column (D), f true is mean add column before column target (D)
        this.worksheetInput.insertColumn(1, this.worksheetInput.options.columns.length, false, {
            type: 'dropdown',
            width: '200px',
            source: ['New Dropdown', 'Apple', 'Banana', 'Orange']
        });
        var cellName = jspreadsheet.helpers.getCellNameFromCoords(this.worksheetInput.options.columns.length - 1, 0);
        this.worksheetInput.setValue(cellName, 'New Dropdown');
        this.worksheetInput.setReadOnly(cellName, true);
        this.worksheetInput.setStyle(cellName, 'background-color', 'yellow', true);
        this.worksheetInput.setStyle(cellName, 'color', '#363434', true);

        //---------------add new column with type input
        this.worksheetInput.insertColumn(1, this.worksheetInput.options.columns.length, false, {
            type: 'text',
            width: '200px',
        });
        cellName = jspreadsheet.helpers.getCellNameFromCoords(this.worksheetInput.options.columns.length - 1, 0);
        this.worksheetInput.setValue(cellName, 'New Column Text Formula');
        this.worksheetInput.setReadOnly(cellName, true);
        this.worksheetInput.setStyle(cellName, 'background-color', 'yellow', true);
        this.worksheetInput.setStyle(cellName, 'color', '#363434', true);
    }
    addRow() {
        this.flagAddRow = true;
        //---------------add rows
        this.worksheetInput.insertRow(1);
        const numRows = this.worksheetInput.options.data.length;
        var cellNameA = 'A' + numRows;
        var cellNameB = 'B' + numRows;
        var cellNameC = 'C' + numRows;
        var cellNameD = 'D' + numRows;
        this.worksheetInput.setValue(cellNameA, numRows - 1);
        this.worksheetInput.setReadOnly(cellNameA, true);
        this.worksheetInput.setStyle(cellNameA, 'color', '#363434', true);
        this.worksheetInput.setStyle(cellNameA, 'background-color', '#eeeeee', true);

        this.worksheetInput.setStyle(cellNameB, 'background-color', '#eeeeee', true);
        this.worksheetInput.setValue(cellNameC, '%');
        this.worksheetInput.setValue(cellNameD, 'DMB');

        this.flagAddRow = false;
    }
    dropdownFilter(instance, cell, c, r, source) {
        let toRemove = (source.includes('Satuan')) ? 'Satuan' : 'Level';
        const index = source.indexOf(toRemove); // Find the index of the item
        if (index > -1) {
            // Check if the item exists
            source.splice(index, 1); // Remove 1 element at the found index
        }
        return source;
    }
    negative(v) {
        return -1 * v;
    }
    callBe(dataSource) {
        // console.log(script + " from backend");
        // return -1 * script;
        // return script + " from backend";

        $.ajax({
            url: "spreedsheet/formulaCalculator",
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                dataSource: dataSource
            },
            beforeSend: function () {

            },
            success: function (res) {
                this.isChangeByProgram = true;
                // this.worksheet.setValue('H6', res.H6, true);
                // this.worksheet.setValue('H7', res.H7, true);
                // this.worksheet.setValue('H8', res.H8, true);
                // this.worksheet.setValue('H9', res.H9, true);
                // this.worksheet.setValue('H10', res.H10, true);
                this.isChangeByProgram = false;
                console.log("response complex formula " + JSON.stringify(res))
            },
            error: function (err) {
                var message = err.responseJSON.meta.message
                console.log(`${err.status} ${err.statusText}`)
                console.log(err.responseJSON)
            },
        })
    }
    getData() {
        // console.log(this.datasourceInput);
        console.log(this.worksheetInput.getData());
        console.log(this.worksheetInput.getStyle());
        console.log(this.worksheetInput.getMerge());
    }
}
