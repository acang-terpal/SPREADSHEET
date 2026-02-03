$(document).ready(function () {
    ctrlCalc.init();
    ctrlCalc.callBe(ctrlCalc.datasource);
});

// column variant
// columns: [
//     { type: 'text', title:'value 1', width:120 },
//     { type: 'text', title:'value 2', width:120 },
//     { type: 'dropdown', title:'Make', width:200, source:[ "Alfa Romeo", "Audi", "Bmw" ] },
//     { type: 'calendar', title:'Available', width:200 },
//     { type: 'image', title:'Photo', width:120 },
//     { type: 'checkbox', title:'Stock', width:80 },
//     { type: 'numeric', title:'Price', width:100, mask:'$ #.##,00', decimal:',' },
//     { type: 'color', width:100, render:'square', }
// ],

let NEGATIVE = function(v) {
    return ctrlCalc.negative(v);
}

ctrlCalc = {
    worksheet: "",
    datasource: [
        ['' , '2025', ''],
        [''],
        ['DMOO', 'Deviasi Kuantitas Impor Minyak Mentah untuk Feedstock Kilang dari Kuantitas yang Direkomendasikan', ''],
        [''],
        ['', 'Surat Rekomendasi / TW', 'kuota per surat rekomendasi (bbl)', 'realisasi per TW (bbl)', 'selisih realisasi dan kuota (bbl)', 'Realisasi Deviasi (%)', 'Target Deviasi %', 'Kinerja', 'Catatan'],
        ['', 'I', '61798739', '26904191.78', '=C6-D6', '=E6/C6', '0.15', '','pemberian rekom/kuota per tahun'],
        ['', 'II', '61798739', '59773031.23', '=C7-D7', '=E7/C7', '0.15', '', ''],
        ['', 'III', '139544838', '82941956', '=C8-D8', '=E8/C6', '0.15', ''],
        ['', 'IV', '139544838', '118872037', '=C9-D9', '=E9/C6', '0.15', ''],
        ['', 'TH 2025', '=C6', '=SUM(D6:D9)', '=C10-D10', '=E10/C10', '0.15', '', '', '=NEGATIVE(6)'],
    ],
    tempBeforeChange: "",
    isChangeByBeRespons: false,
    init: function () {
        // Create spreadsheet
        formula.setFormula({NEGATIVE});
        ctrlCalc.worksheet = jspreadsheet(document.getElementById('spreadsheet'), {
            // toolbar: true,
            worksheets: [{
                data: ctrlCalc.datasource,
                worksheetName : 'test1',
                worksheetId: '0',
                columns: [
                    { type: 'text', width: 50 },
                    { type: 'text', width: 120, wordWrap: true },
                    { type: 'numeric', width: 120, wordWrap: true },
                    { type: 'numeric', width: 120, wordWrap: true },
                    { type: 'numeric', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 120, readOnly: true, wordWrap: true },
                    { type: 'text', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 50 },
                ],
            }],
            onbeforechange: function (instance, cell, x, y, value) {
                ctrlCalc.tempBeforeChange = structuredClone(ctrlCalc.datasource[y][x]);
            },
            onchange: function (instance, cell, x, y, value) {
                if(ctrlCalc.tempBeforeChange !== value && ctrlCalc.isChangeByBeRespons == false){
                    // console.log(ctrlCalc.datasource)
                    cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y);
                    console.log('New change on cell ' + cellName + ' from: ' + ctrlCalc.tempBeforeChange + ' to: ' + value);
                    //call backend
                    ctrlCalc.callBe(ctrlCalc.datasource);
                }
            }
        })[0];
        // console.log(ctrlCalc.worksheet);
        ctrlCalc.worksheet.setStyle({'B5': 'background-color: #827f7f;',
            'C5': 'background-color: #827f7f;',
            'D5': 'background-color: #827f7f;',
            'E5': 'background-color: #827f7f',
            'F5': 'background-color: #827f7f',
            'G5': 'background-color: #827f7f',
            'H5': 'background-color: #827f7f;',
            'I5': 'background-color: #827f7f'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'C6': 'background-color: #e8f584;',
            'C7': 'background-color: #e8f584;',
            'C8': 'background-color: #e8f584;',
            'C9': 'background-color: #e8f584',
            'D6': 'background-color: #e8f584',
            'D7': 'background-color: #e8f584',
            'D8': 'background-color: #e8f584;',
            'D9': 'background-color: #e8f584'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'B10': 'background-color: #b79600;',
            'C10': 'background-color: #b79600;',
            'D10': 'background-color: #b79600;',
            'E10': 'background-color: #b79600',
            'F10': 'background-color: #b79600; color: #8d0303;',
            'G10': 'background-color: #b79600',
            'H10': 'background-color: #b79600; color: #8d0303;',
            'I10': 'background-color: #b79600'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'E6': 'color: #4c4a4a;', 'E7': 'color: #4c4a4a;','E8': 'color: #4c4a4a;','E9': 'color: #4c4a4a', 'E10': 'color: #4c4a4a'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'F6': 'background-color: #a5e082; color: #4c4a4a', 'F7': 'background-color: #a5e082; color: #4c4a4a','F8': 'background-color: #a5e082; color: #4c4a4a','F9': 'background-color: #a5e082; color: #4c4a4a', 'F10': 'color: #4c4a4a'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'F6': 'background-color: #a5e082; color: #4c4a4a', 'F7': 'background-color: #a5e082; color: #4c4a4a','F8': 'background-color: #a5e082; color: #4c4a4a','F9': 'background-color: #a5e082; color: #4c4a4a', 'F10': 'color: #8d0303'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'G6': 'background-color: #a5e082; color: #4c4a4a', 'G7': 'background-color: #a5e082; color: #4c4a4a','G8': 'background-color: #a5e082; color: #4c4a4a','G9': 'background-color: #a5e082; color: #4c4a4a', 'G10': 'color: #4c4a4a'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'H6': 'background-color: #a5e082; color: #4c4a4a', 'H7': 'background-color: #a5e082; color: #4c4a4a','H8': 'background-color: #a5e082; color: #4c4a4a','H9': 'background-color: #a5e082; color: #4c4a4a', 'H10': 'color: #8d0303'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'I6': 'background-color: #a5e082; color: #4c4a4a'}, null, null, true);
        ctrlCalc.worksheet.setStyle({'A3': 'color: #8d0303;'});
        ctrlCalc.worksheet.setStyle({'B1': 'background-color: #8d0303; color: #f4f0f0;'});
        ctrlCalc.worksheet.setStyle({'B3': 'background-color: #0f065a; color: #f4f0f0;',});
        ctrlCalc.worksheet.setStyle({'A3': 'color: #8d0303;'});
        ctrlCalc.worksheet.setMerge('A3', 0, 8);
        ctrlCalc.worksheet.setMerge('B1', 8, 2);
        ctrlCalc.worksheet.setMerge('B3', 8, 1);
        ctrlCalc.worksheet.setMerge('I6', 0, 4);
    },
    negative: function (v) {
        return -1 * v;
    },
    callBe: function(dataSource) {
        // console.log(script + " from backend");
        // return -1 * script;
        // return script + " from backend";

        $.ajax({
            url:"spreedsheet/formulaCalculator",
            type:'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                dataSource : dataSource
            },
            beforeSend:function() {

            },
            success:function(res) {
                ctrlCalc.isChangeByBeRespons = true;
                ctrlCalc.worksheet.setValue('H6', res.H6, true);
                ctrlCalc.worksheet.setValue('H7', res.H7, true);
                ctrlCalc.worksheet.setValue('H8', res.H8, true);
                ctrlCalc.worksheet.setValue('H9', res.H9, true);
                ctrlCalc.worksheet.setValue('H10', res.H10, true);
                ctrlCalc.isChangeByBeRespons = false;
                console.log("response complex formula " + JSON.stringify(res))
            },
            error:function(err) {
                var message = err.responseJSON.meta.message
                console.log(`${err.status} ${err.statusText}`)
                console.log(err.responseJSON)
            },
        })
    }
}
