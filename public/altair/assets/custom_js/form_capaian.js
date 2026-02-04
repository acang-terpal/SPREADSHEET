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
    ctrlDashboard.initSpreedSheetCapaian();
});

let NEGATIVE = function (v) {
    return ctrlDashboard.negative(v);
}

ctrlDashboard = {
    worksheetCapaian: "",
    datasourceCapaian: [
        ['No', 'IKSP/IKSP', 'Level', 'Satuan', 'PIC', 'Target'],
        ['1', 'Persentase Pemanfaatan Gas Bumi Domestik', 'IKSK-2', '%', 'DMB'],
        ['2', 'Persentase Rekomendasi kebijakan dan Dokumen Perencanaan yang Diterima Oleh Stakeholder', 'IKSK-2', '%', 'DMB'],
        ['3', 'Deviasi Penetapan Harga Minyak Mentah Indonesia (ICP)', 'IKSK-2', '%', 'DMB'],
        ['4', 'Deviasi Harga Gas Skema Hulu (Gas Pipa,LNG, LPG dan Gas Suar)', 'IKSK-2', '%', 'DMB'],
        ['5', 'Persentase Tingkat Komponen Dalam Negeri (TKDN) pada Kegiatan Usaha Hulu Migas', 'IKSP', '%', 'DMB'],
        ['6', 'Persentase Tingkat Komponen Dalam Negeri (TKDN) pada Kegiatan Usaha Hulu Migas', 'IKSK-2', '%', 'DMB'],
        ['7', 'Persentase Realisasi Investasi Sub Sektor Migas', 'IKSK-2', '%', 'DMB'],
        ['8', 'Persentase Realisasi Investasi subsektor Migas', 'IKSK-2', '%', 'DMB'],
        ['9', 'Persentase Realisasi Penerimaan Negara Migas', 'IKSK-2', '%', 'DMB'],
        ['10', 'Indeks Kepuasan Layanan Program Migas', 'IKSK-2', 'Skala 4', 'DMB'],
        ['11', 'Indeks Efektivitas Pembinaan dan Pengawasan Program Migas', 'IKSK-2', 'Nilai', 'DMB'],
        ['12', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Bebas Hukuman Disiplin', 'IKSK-2', '%', 'DMB'],
        ['13', 'Persentase Pegawai Direktorat Pembinaan Progam Migas yang Mencapai/ Melebihi Target Kinerja', 'IKSK-2', '%', 'DMB'],
        ['14', 'Persentase Realisasi Anggaran Direktorat Pembinaan Program Migas', 'IKSK-2', '%', 'DMB'],
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
    initSpreedSheetCapaian: function () {
        var parentWidth = $("#spreadSheetCapaian").parent().width();
        // Create spreadsheet
        formula.setFormula({ NEGATIVE });
        ctrlDashboard.worksheetCapaian = $('#spreadSheetCapaian').jspreadsheet({
            // toolbar: true,
            worksheets: [{
                data: ctrlDashboard.datasourceCapaian,
                worksheetName: 'test1',
                worksheetId: '0',
                columnResize: false,
                tableWidth: parentWidth,
                tableOverflow: true,
                columns: [
                    { type: 'text', width: 50, wordWrap: true },
                    { type: 'text', width: 420, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'text', width: 120, wordWrap: true },
                ],
            }],
            contextMenu: function () {
                return false;
            },
            onbeforechange: function (instance, cell, x, y, value) {
                ctrlDashboard.tempBeforeChange = structuredClone(ctrlDashboard.datasourceCapaian[y][x]);
            },
            onchange: function (instance, cell, x, y, value) {
                if (ctrlDashboard.tempBeforeChange !== value && ctrlDashboard.isChangeByBeRespons == false) {
                    // console.log(ctrlDashboard.datasourceCapaian)
                    cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y);
                    console.log('New change on cell ' + cellName + ' from: ' + ctrlDashboard.tempBeforeChange + ' to: ' + value);
                    //call backend
                    // ctrlDashboard.callBe(ctrlDashboard.datasourceCapaian);
                }
            }
        })[0];
        // Example: Loop through 6 columns (A-F) and 15 rows (1-15)
        const numCols = 6;
        const numRows = 15;

        for (let i = 0; i < numCols; i++) {
            // Convert 0, 1, 2 to 'A', 'B', 'C'
            let colLetter = String.fromCharCode(65 + i);

            for (let j = 1; j <= numRows; j++) {
                let cellCoord = colLetter + j; // A1, A2... B1...
                //console.log(cellCoord);
                ctrlDashboard.worksheetCapaian.setReadOnly(cellCoord, true);
                ctrlDashboard.worksheetCapaian.setStyle(cellCoord, 'color', '#363434', true);
                if (j == 1) {
                    ctrlDashboard.worksheetCapaian.setStyle(cellCoord, 'background-color', 'yellow', true);
                } else if (i < 5) {
                    ctrlDashboard.worksheetCapaian.setStyle(cellCoord, 'background-color', '#dfdfdf', true);
                } else if (i >= 5 && j != 1) {
                    ctrlDashboard.worksheetCapaian.setReadOnly(cellCoord, false);
                    ctrlDashboard.worksheetCapaian.setStyle(cellCoord, 'background-color', 'white', true);
                }
            }
        }
    },
    negative: function (v) {
        return -1 * v;
    }
}
