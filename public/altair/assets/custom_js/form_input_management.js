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
        ['1', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Bebas Hukuman Disiplin', '%', 'DMB'],
        ['2', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Mencapai/ Melebihi Target Kinerja', '%', 'DMB'],
    ],
    tempBeforeChange: "",
    isChangeByBeRespons: false,
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
                columns: [
                    { type: 'text', width: 50, title:'No', wordWrap: true },
                    { type: 'text', width: 420, title:'Data Dibutuhkan', wordWrap: true },
                    { type:'dropdown', width:'120px', title:'Satuan', source:['%','BBL', 'MMSCFD'] },
                    { type: 'text', width: 120, title:'Penyedia Data', wordWrap: true },
                    { type: 'text', width: 120, title:'TW I', wordWrap: true },
                    { type: 'text', width: 120, title:'TW II', wordWrap: true },
                    { type: 'text', width: 120, title:'TW III', wordWrap: true },
                    { type: 'text', width: 120, title:'TW IV', wordWrap: true },
                ],
            }],
            contextMenu: function () {
                return false;
            },
            onbeforechange: function (instance, cell, x, y, value) {
                ctrlDashboard.tempBeforeChange = structuredClone(ctrlDashboard.datasourceInput[y][x]);
            },
            onchange: function (instance, cell, x, y, value) {
                if (ctrlDashboard.tempBeforeChange !== value && ctrlDashboard.isChangeByBeRespons == false) {
                    // console.log(ctrlDashboard.datasourceInput)
                    cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y);
                    console.log('New change on cell ' + cellName + ' from: ' + ctrlDashboard.tempBeforeChange + ' to: ' + value);
                    //call backend
                    ctrlDashboard.callBe(ctrlDashboard.datasourceInput);
                }
            }
        })[0];
        // ctrlDashboard.worksheetInput = $('#spreadSheetInput').jspreadsheet({

        // })[0];
        // Example: Loop through 8 columns (A-H) and 3 rows (1-3)
        const numCols = 2;
        const numRows = 2;

        for (let i = 0; i < numCols; i++) {
            // Convert 0, 1, 2 to 'A', 'B', 'C'
            let colLetter = String.fromCharCode(65 + i);

            for (let j = 1; j <= numRows; j++) {
                let cellCoord = colLetter + j; // A1, A2... B1...
                console.log(cellCoord);
                ctrlDashboard.worksheetInput.setReadOnly(cellCoord, true);
                ctrlDashboard.worksheetInput.setStyle(cellCoord, 'color', '#363434', true);
                if (j < 3) {
                    ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', '#d1d1d1', true);
                } else if (i >= 3 && j != 1) {
                    ctrlDashboard.worksheetInput.setReadOnly(cellCoord, false);
                    ctrlDashboard.worksheetInput.setStyle(cellCoord, 'background-color', 'white', true);
                }
            }
        }
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
                ctrlDashboard.isChangeByBeRespons = true;
                // ctrlDashboard.worksheet.setValue('H6', res.H6, true);
                // ctrlDashboard.worksheet.setValue('H7', res.H7, true);
                // ctrlDashboard.worksheet.setValue('H8', res.H8, true);
                // ctrlDashboard.worksheet.setValue('H9', res.H9, true);
                // ctrlDashboard.worksheet.setValue('H10', res.H10, true);
                ctrlDashboard.isChangeByBeRespons = false;
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
