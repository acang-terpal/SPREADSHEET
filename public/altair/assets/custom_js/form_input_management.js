// Polyfill to integrate jspreadsheet and jquery
if (typeof(jQuery) !== 'undefined') {
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

// const observer = new ResizeObserver(entries => {
//     for (let entry of entries) {
//         console.log('Elemen berubah ukuran!', entry.contentRect.width);
//     }
// });

// // Mulai memantau elemen (misal: body atau div tertentu)
// observer.observe($('#page_content_inner')[0]);

$(document).ready(function () {
    ctrlFormInput.initKendo();
    ctrlFormInput.initModal();
    ctrlFormInput.initSelectize();
    ctrlFormInput.initSpreedSheetInput();
    ctrlFormInput.initObserverPageContentIner();
    ctrlFormInput.callBe(ctrlFormInput.datasourceInput);
});

let NEGATIVE = function (v) {
    return ctrlFormInput.negative(v);
}

ctrlFormInput = {
    observerPageContentIner: "",
    worksheetInput: "",
    modalCreateColumn: "",
    dropDownPic: "",
    dropDownLevel: "",
    dropDownSatuan: "",
    datasourceInput: [
        ['No', 'Data Dibutuhkan', 'Satuan', 'Level'],
        ['1', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Bebas Hukuman Disiplin', '%', 'DMB'],
        ['2', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Mencapai/ Melebihi Target Kinerja', '%', 'DMB'],
    ],
    tempSatuanBeforeChange: "",
    tempLevelBeforeChange: "",
    isChangeByProgram: false,
    //detect if page content iner width height change
    initObserverPageContentIner: function(){
        ctrlFormInput.observerPageContentIner = new ResizeObserver(entries => {
            for (let entry of entries) {
                console.log('Elemen berubah ukuran!', entry.contentRect.width);
                // // Ambil lebar container (dikurangi sedikit untuk padding/scrollbar jika ada)
                // const containerWidth = entry.contentRect.width - 100;
                // // Hitung jumlah kolom
                // const columnCount = ctrlFormInput.worksheetInput.options.columns.length;
                // // Hitung lebar rata tiap kolom
                // const equalWidth = Math.floor(containerWidth / columnCount);
                // // Terapkan ke semua kolom secara programatik
                // for (let i = 0; i < columnCount; i++) {
                //     ctrlFormInput.worksheetInput.setWidth(i, equalWidth);
                // }
            }
        });
        ctrlFormInput.observerPageContentIner.observe($('#page_content_inner')[0]);
    },
    initKendo: function () {
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
    },
    initModal: function(){
        ctrlFormInput.modalCreateColumn = UIkit.modal($('#modal_overflow'));
    },
    initSelectize: function(){
        // init dropdown pic
        ctrlFormInput.dropDownPic = $('#drop_pic').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                }
            },
            options: [
                {id: 1, text: 'DMEP'},
                {id: 2, text: 'DMOT'},
                {id: 3, text: 'DMEP'},
                {id: 4, text: 'DMBS'},
            ],
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            render: {
                option: function(data, escape) {
                    return  '<div class="option">' +
                            '<span class="title">' + escape(data.text) + '</span>' +
                            '</div>';
                },
                item: function(data, escape) {
                    return '<div class="item">'+escape(data.text)+'</div>';
                }
            },
            create:function (input){
                return { id:123, text:input};
            },
            onDropdownOpen: function($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function() {
                            $dropdown.css({'margin-top':'0'})
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            },
            onDropdownClose: function($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function() {
                            $dropdown.css({'margin-top':''})
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            }
        });

        // init dropdown level
        ctrlFormInput.dropDownLevel = $('#drop_level').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                }
            },
            options: [
                {id: 1, text: 'IKSP'},
                {id: 2, text: 'IKSK-2'},
                {id: 3, text: 'IKSK-3'},
                {id: 4, text: 'IKSK-4'},
            ],
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            render: {
                option: function(data, escape) {
                    return  '<div class="option">' +
                            '<span class="title">' + escape(data.text) + '</span>' +
                            '</div>';
                },
                item: function(data, escape) {
                    return '<div class="item">'+escape(data.text)+'</div>';
                }
            },
            create:function (input){
                return { id:123, text:input};
            },
            onDropdownOpen: function($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function() {
                            $dropdown.css({'margin-top':'0'})
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            },
            onDropdownClose: function($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function() {
                            $dropdown.css({'margin-top':''})
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            }
        });

        // init dropdown satuan
        ctrlFormInput.dropDownSatuan = $('#drop_satuan').selectize({
            plugins: {
                'remove_button': {
                    label     : ''
                }
            },
            options: [
                {id: 1, text: 'MMSTB'},
                {id: 2, text: 'TCF'},
                {id: 3, text: 'BBOE'},
                {id: 4, text: 'km2'},
                {id: 5, text: 'sumur'},
                {id: 6, text: 'Jumlah Rekom POD I'},
                {id: 7, text: 'Jumlah Evaluasi'},
                {id: 8, text: 'Jumlah Rekomendasi'},
                {id: 9, text: 'Dokumen/SR'},
                {id: 10, text: 'Ruas'},
                {id: 11, text: 'ton/d'},
                {id: 12, text: 'mton'},
                {id: 13, text: 'RIBU BCPD'},
                {id: 14, text: 'RIBU BOPD'},
                {id: 15, text: 'JUTA TON'},
                {id: 16, text: 'Tingkat Kepuasan'},
                {id: 17, text: 'Jumlah Penandasahan'},
                {id: 18, text: 'Level'},
                {id: 19, text: 'Nilai SAKIP'},
                {id: 20, text: 'Jumlah Komponen'},
                {id: 21, text: '%'}
            ],
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            render: {
                option: function(data, escape) {
                    return  '<div class="option">' +
                            '<span class="title">' + escape(data.text) + '</span>' +
                            '</div>';
                },
                item: function(data, escape) {
                    return '<div class="item">'+escape(data.text)+'</div>';
                }
            },
            create:function (input){
                return { id:123, text:input};
            },
            onDropdownOpen: function($dropdown) {
                $dropdown
                    .hide()
                    .velocity('slideDown', {
                        begin: function() {
                            $dropdown.css({'margin-top':'0'})
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            },
            onDropdownClose: function($dropdown) {
                $dropdown
                    .show()
                    .velocity('slideUp', {
                        complete: function() {
                            $dropdown.css({'margin-top':''})
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
            }
        });

        $('#jenis_input').on('change', function() {
            // This function will execute every time the selected option changes
            var selectedValue = $(this).val();
            var selectedText = $(this).find('option:selected').text();
            console.log('Selected Value: ' + selectedValue);
            console.log('Selected Text: ' + selectedText);
            if(selectedText == 'Input'){
                ctrlFormInput.hideSelectize('all');
            } else if(selectedText == 'Dropown PIC'){
                ctrlFormInput.showSelectize('pic');
            } else if(selectedText == 'Dropown Level PIC'){
                ctrlFormInput.showSelectize('level');
            } else {
                ctrlFormInput.showSelectize('satuan');
            }
        });
        // default hide all
        ctrlFormInput.hideSelectize('all');
    },
    hideSelectize: function(elName){
        if(elName == 'all'){
            // hide selectize
            $('#wrapper_pic').hide();
            // hide selectize
            $('#wrapper_level').hide();
            // hide selectize
            $('#wrapper_satuan').hide();
        }
    },
    showSelectize: function(elName){
        if(elName == 'pic'){
            $('#wrapper_pic').show();
            $('#wrapper_level').hide();
            $('#wrapper_satuan').hide();
        } else if(elName == 'level'){
            $('#wrapper_pic').hide();
            $('#wrapper_level').show();
            $('#wrapper_satuan').hide();
        } else if(elName == 'satuan'){
            $('#wrapper_pic').hide();
            $('#wrapper_level').hide();
            $('#wrapper_satuan').show();
        }
    },
    initSpreedSheetInput: function () {
        var parentWidth = $("#spreadSheetInput").parent().width();
        // Create spreadsheet
        formula.setFormula({ NEGATIVE });
        // ctrlFormInput.worksheetInput = jspreadsheet(document.getElementById('spreadSheetInput'), {

        // })[0];
        ctrlFormInput.worksheetInput = $('#spreadSheetInput').jspreadsheet({
            // toolbar: true,
            worksheets: [{
                data: ctrlFormInput.datasourceInput,
                worksheetName: 'test1',
                worksheetId: '0',
                columnResize: false,
                tableWidth: parentWidth - 20,
                tableOverflow: true,
                filters: false,
                columnSorting: false,
                columnDrag: false,
                columns: [
                    { type: 'text', width: 50, wordWrap: true },
                    { type: 'text', width: 420, wordWrap: true },
                    { type:'dropdown', width:'120px', source:['Satuan', '%','BBL', 'MMSCFD'] },
                    { type:'dropdown', width:'120px', source:['Level', 'DMB','DMO', 'DMOP'] },
                ],
            }],
            onload: function(instance) {
                ctrlFormInput.setupBehaviourCell(instance);
            },
            onselection: function(instance, x1, y1, x2, y2){
                // console.log("x1 : " + x1 + " y1 : " + y1 + " x2 : " + x2 + " y2 : " + y2);
                // its mean header column E clicked
                if(x2 == 4 && y2 > 0){
                    // instance.resetSelection();
                    return false;
                }
                cellName = jspreadsheet.helpers.getCellNameFromCoords(x1, y1);
                // its mean column E clicked on row 0
                if(x1 == 4 && y1 == 0){
                    ctrlFormInput.modalCreateColumn.show();
                }
            },
            contextMenu: function () {
                return false;
            },
            onbeforechange: function (instance, cell, x, y, value) {
                // // -----------------------handle dropdown--------------------------
                // if (value === 'Satuan' || value === 'Level' || value == '') {
                //     return false; // Cancel the change
                // } else if (x == 2){
                //     ctrlFormInput.tempSatuanBeforeChange = structuredClone(ctrlFormInput.datasourceInput[y][x]);
                // } else if (x == 3) {
                //     ctrlFormInput.tempLevelBeforeChange = structuredClone(ctrlFormInput.datasourceInput[y][x]);
                // }
            },
            onchange: function (instance, cell, x, y, value) {
                // cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y);
                // // -----------------------handle dropdown--------------------------
                // if(x == 2 && ctrlFormInput.tempSatuanBeforeChange != value){
                //     if (value != false) {
                //         console.log('New change on cell ' + cellName + ' with coordinate: ' + x + ',' + y + ' from: ' + ctrlFormInput.tempSatuanBeforeChange + ' to: ' + value);
                //         instance.setValueFromCoords(x, y, value);
                //     } else {
                //         console.log('Before change on cell ' + cellName + ' with coordinate: ' + x + ',' + y + ' from: ' + value + ' to: ' + ctrlFormInput.tempSatuanBeforeChange);
                //         instance.setValueFromCoords(x, y, ctrlFormInput.tempSatuanBeforeChange);

                //     }
                // } else if(x == 3 && ctrlFormInput.tempLevelBeforeChange != value){
                //     if (value != false) {
                //         instance.setValueFromCoords(x, y, value);
                //     } else {
                //         instance.setValueFromCoords(x, y, ctrlFormInput.tempLevelBeforeChange);
                //     }
                // }
            },
            onafterchanges: function(){

            }
        })[0];
    },
    setupBehaviourCell: function(instance){
        //----------------------set behaviour cell
        // Example: Loop through 8 columns (A-H) and 3 rows (1-3)
        const numCols = 3;
        const numRows = 3;

        for (let i = 0; i <= numCols; i++) {
            // Convert 0, 1, 2 to 'A', 'B', 'C'
            let colLetter = String.fromCharCode(65 + i);
            for (let j = 1; j <= numRows; j++) {
                let cellCoord = colLetter + j; // A1, A2... B1...
                // console.log(cellCoord);
                ctrlFormInput.worksheetInput.setReadOnly(cellCoord, true);
                ctrlFormInput.worksheetInput.setStyle(cellCoord, 'color', '#363434', true);
                if (j == 1) {
                    ctrlFormInput.worksheetInput.setStyle(cellCoord, 'background-color', 'yellow', true);
                } else if (i < 2 && j >= 2) {
                    ctrlFormInput.worksheetInput.setStyle(cellCoord, 'background-color', '#eeeeee', true);
                } else if (i == 2 && j != 1) {
                    ctrlFormInput.worksheetInput.setReadOnly(cellCoord, false);
                    ctrlFormInput.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    ctrlFormInput.worksheetInput.setValue(cellCoord, '%');
                } else if (i == 3 && j != 1) {
                    ctrlFormInput.worksheetInput.setReadOnly(cellCoord, false);
                    ctrlFormInput.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    ctrlFormInput.worksheetInput.setValue(cellCoord, 'DMB');
                } else if (i == 4 && j != 1) {
                    ctrlFormInput.worksheetInput.setReadOnly(cellCoord, false);
                    ctrlFormInput.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    // change column to drop down
                    // ctrlFormInput.worksheetInput.options.columns[i].type = 'dropdown';
                    // ctrlFormInput.worksheetInput.options.columns[i].source = ['Pilihan A', 'Pilihan B', 'Pilihan C'];
                    // 2. Refresh tampilan (paksa pembuatan ulang DOM editor)
                    // ctrlFormInput.worksheetInput.setData(ctrlFormInput.worksheetInput.getData());
                }
            }
        }
    },
    addColumn: function(){
        ctrlFormInput.modalCreateColumn.show();
        //---------------add new column dropdown
        // case (1, 3, true) column and row always start on index 0, so this mean: 1 -> add 1 column, 3 -> target column D, false -> add column after target column (D), f true is mean add column before column target (D)
        ctrlFormInput.worksheetInput.insertColumn(1, ctrlFormInput.worksheetInput.options.columns.length, false, {
            type: 'dropdown',
            width: '200px',
            source: ['New Dropdown', 'Apple', 'Banana', 'Orange']
        });
        cellName = jspreadsheet.helpers.getCellNameFromCoords(ctrlFormInput.worksheetInput.options.columns.length - 1, 0);
        ctrlFormInput.worksheetInput.setValue(cellName, 'New Dropdown');
        ctrlFormInput.worksheetInput.setReadOnly(cellName, true);
        ctrlFormInput.worksheetInput.setStyle(cellName, 'background-color', 'yellow', true);
        ctrlFormInput.worksheetInput.setStyle(cellName, 'color', '#363434', true);

        //---------------add new column input
        ctrlFormInput.worksheetInput.insertColumn(1, ctrlFormInput.worksheetInput.options.columns.length, false, {
            type: 'text',
            width: '200px',
        });
        cellName = jspreadsheet.helpers.getCellNameFromCoords(ctrlFormInput.worksheetInput.options.columns.length - 1, 0);
        ctrlFormInput.worksheetInput.setValue(cellName, 'New Column Text Formula');
        ctrlFormInput.worksheetInput.setReadOnly(cellName, true);
        ctrlFormInput.worksheetInput.setStyle(cellName, 'background-color', 'yellow', true);
        ctrlFormInput.worksheetInput.setStyle(cellName, 'color', '#363434', true);
    },
    negative: function (v) {
        return -1 * v;
    },
    callBe: function (dataSource) {
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
                ctrlFormInput.isChangeByProgram = true;
                // ctrlFormInput.worksheet.setValue('H6', res.H6, true);
                // ctrlFormInput.worksheet.setValue('H7', res.H7, true);
                // ctrlFormInput.worksheet.setValue('H8', res.H8, true);
                // ctrlFormInput.worksheet.setValue('H9', res.H9, true);
                // ctrlFormInput.worksheet.setValue('H10', res.H10, true);
                ctrlFormInput.isChangeByProgram = false;
                console.log("response complex formula " + JSON.stringify(res))
            },
            error: function (err) {
                var message = err.responseJSON.meta.message
                console.log(`${err.status} ${err.statusText}`)
                console.log(err.responseJSON)
            },
        })
    }
}
