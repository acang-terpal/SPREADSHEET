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

$(document).ready(function () {
    ctrlDashboard.initKendo();
    ctrlDashboard.initSpreedSheetInput();
    ctrlDashboard.callBe(ctrlDashboard.datasourceInput);
});

let NEGATIVE = function (v) {
    return ctrlDashboard.negative(v);
}

ctrlDashboard = {
    worksheetInput: "",
    datasourceInput: [
        ['No', 'Data Dibutuhkan', 'Satuan', 'Level'],
        ['1', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Bebas Hukuman Disiplin', '%', 'DMB'],
        ['2', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Mencapai/ Melebihi Target Kinerja', '%', 'DMB'],
    ],
    tempSatuanBeforeChange: "",
    tempLevelBeforeChange: "",
    isChangeByProgram: false,
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
    initSpreedSheetInput: function () {
        var parentWidth = $("#spreadSheetInput").parent().width();
        // Create spreadsheet
        formula.setFormula({ NEGATIVE });
        ctrlDashboard.worksheetInput = jspreadsheet(document.getElementById('spreadSheetInput'), {
            // toolbar: true,
            worksheets: [{
                data: ctrlDashboard.datasourceInput,
                worksheetName: 'test1',
                worksheetId: '0',
                columnResize: false,
                tableWidth: parentWidth,
                tableOverflow: true,
                filters: false,
                columns: [
                    { type: 'text', width: 50, wordWrap: true },
                    { type: 'text', width: 420, wordWrap: true },
                    { type:'dropdown', width:'120px', source:['Satuan', '%','BBL', 'MMSCFD'] },
                    { type:'dropdown', width:'120px', source:['Level', 'DMB','DMO', 'DMOP'] },
                ],
            }],
            contextMenu: function () {
                return false;
            },
            onbeforechange: function (instance, cell, x, y, value) {
                // -----------------------handle dropdown--------------------------
                if (value === 'Satuan' || value === 'Level' || value == '') {
                    return false; // Cancel the change
                } else if (x == 2){
                    ctrlDashboard.tempSatuanBeforeChange = structuredClone(ctrlDashboard.datasourceInput[y][x]);
                } else if (x == 3) {
                    ctrlDashboard.tempLevelBeforeChange = structuredClone(ctrlDashboard.datasourceInput[y][x]);
                }
            },
            onchange: function (instance, cell, x, y, value) {
                cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y);
                // -----------------------handle dropdown--------------------------
                if(x == 2 && ctrlDashboard.tempSatuanBeforeChange != value){
                    if (value != false) {
                        console.log('New change on cell ' + cellName + ' with coordinate: ' + x + ',' + y + ' from: ' + ctrlDashboard.tempSatuanBeforeChange + ' to: ' + value);
                        instance.setValueFromCoords(x, y, value);
                    } else {
                        console.log('Before change on cell ' + cellName + ' with coordinate: ' + x + ',' + y + ' from: ' + value + ' to: ' + ctrlDashboard.tempSatuanBeforeChange);
                        instance.setValueFromCoords(x, y, ctrlDashboard.tempSatuanBeforeChange);

                    }
                } else if(x == 3 && ctrlDashboard.tempLevelBeforeChange != value){
                    if (value != false) {
                        instance.setValueFromCoords(x, y, value);
                    } else {
                        instance.setValueFromCoords(x, y, ctrlDashboard.tempLevelBeforeChange);
                    }
                }
            },
            onafterchanges: function(){

            }
        })[0];
        // ctrlDashboard.worksheetInput = $('#spreadSheetInput').jspreadsheet({

        // })[0];
        // Example: Loop through 8 columns (A-H) and 3 rows (1-3)
        const numCols = 4;
        const numRows = 3;

        for (let i = 0; i < numCols; i++) {
            // Convert 0, 1, 2 to 'A', 'B', 'C'
            let colLetter = String.fromCharCode(65 + i);
            for (let j = 1; j <= numRows; j++) {
                let cellCoord = colLetter + j; // A1, A2... B1...
                // console.log(cellCoord);
                ctrlDashboard.worksheetInput.setReadOnly(cellCoord, true);
                ctrlDashboard.worksheetInput.setStyle(cellCoord, 'color', '#363434', true);
                if (j == 1) {
                    ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', 'yellow', true);
                } else if (i < 2 && j >= 2) {
                    ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', '#eeeeee', true);
                } else if (i == 2 && j != 1) {
                    ctrlDashboard.worksheetInput.setReadOnly(cellCoord, false);
                    ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    ctrlDashboard.worksheetInput.setValue(cellCoord, '%');
                } else if (i == 3 && j != 1) {
                    ctrlDashboard.worksheetInput.setReadOnly(cellCoord, false);
                    ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                    ctrlDashboard.worksheetInput.setValue(cellCoord, 'DMB');
                }
            }
        }
        // console.log(ctrlDashboard.worksheetInput.getCellFromCoords(2, 1));
        cellDropDown = ctrlDashboard.worksheetInput.getCellFromCoords(2, 1);
        // -------------------change bg collor and font collor
        // ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', 'yellow', true);
        // ctrlDashboard.worksheetInput.setStyle(cellCoord, 'color', '#363434', true);
        // ---------------or this way to change bg collor and font collor
        // ctrlDashboard.worksheetInput.getCell(cellCoord).style.backgroundColor = 'orange';
        // ctrlDashboard.worksheetInput.getCell(cellCoord).style.color = '#363434';
        // ---------------------or this way
        // ctrlDashboard.worksheetInput.setStyle({'B5': 'background-color: #827f7f;color: #363434;',
        //     'C5': 'background-color: #827f7f;color: #363434;',
        //     'D5': 'background-color: #827f7f;color: #363434;',
        //     'E5': 'background-color: #827f7f;color: #363434;',
        //     'F5': 'background-color: #827f7f;color: #363434;',
        //     'G5': 'background-color: #827f7f;color: #363434;',
        //     'H5': 'background-color: #827f7f;color: #363434;',
        //     'I5': 'background-color: #827f7f;color: #363434;'}, null, null, true);
        // --------------------------how to merge cell
        // ctrlDashboard.worksheetInput.setMerge('I6', 0, 4);
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
                ctrlDashboard.isChangeByProgram = true;
                // ctrlDashboard.worksheet.setValue('H6', res.H6, true);
                // ctrlDashboard.worksheet.setValue('H7', res.H7, true);
                // ctrlDashboard.worksheet.setValue('H8', res.H8, true);
                // ctrlDashboard.worksheet.setValue('H9', res.H9, true);
                // ctrlDashboard.worksheet.setValue('H10', res.H10, true);
                ctrlDashboard.isChangeByProgram = false;
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
