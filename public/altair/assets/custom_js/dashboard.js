$(document).ready(function () {
    ctrlDashboard.initPeity();
    ctrlDashboard.initKendo();
    ctrlDashboard.initSpreadSheet();
    ctrlDashboard.callBe(ctrlDashboard.datasource);
});

let NEGATIVE = function(v) {
    return ctrlDashboard.negative(v);
}

ctrlDashboard = {
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
    initPeity: function() {
        $(".peity_orders").peity("donut", {
            height: 24,
            width: 24,
            fill: ["#8bc34a", "#eee"]
        });
        $(".peity_visitors").peity("bar", {
            height: 28,
            width: 48,
            fill: ["#d84315"],
            padding: 0.2
        });
        $(".peity_sale").peity("line", {
            height: 28,
            width: 64,
            fill: "#d1e4f6",
            stroke: "#0288d1"
        });
        $(".peity_conversions_large").peity("bar", {
            height: 64,
            width: 96,
            fill: ["#d84315"],
            padding: 0.2
        });
        var $peity_live = $('.peity_live');
        if ($peity_live.length) {
            // live update
            var peityLive = $peity_live.peity("line", {
                height: 28,
                width: 64,
                fill: "#efebe9",
                stroke: "#5d4037"
            });
            // fix for "startVal or endVal is not a number" error
            $('#peity_live_text').text('0');

            function getRandomVal(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            setInterval(function () {
                var random = Math.round(Math.random() * 10);
                var values = peityLive.text().split(",");
                values.shift();
                values.push(random);

                peityLive
                    .text(values.join(","))
                    .change();

                var countFrom = parseInt($('#peity_live_text').text()),
                    countTo = getRandomVal(20, 100);

                if(countFrom == countTo) {
                    var countTo = getRandomVal(20, 120);
                }

                var numAnim = new CountUp('peity_live_text', countFrom, countTo, 0, 1.2);
                numAnim.start();

            }, 2000)
        }
        $('.countUpMe').each(function () {
            target = this;
            countTo = $(target).text();
            theAnimation = new CountUp(target, 0, countTo, 0, 2);
            theAnimation.start();
        });
    },
    initKendo: function() {
        $("#tgl").kendoDatePicker({
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
        if($search.length) {
            var data = [
                {text: "Deviasi Ekspor Impor", value: "1"},
                {text: "NKO", value: "2"},
                {text: "Capaian", value: "3"}
            ];
            $search.kendoDropDownList({
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                index: 0
            });
        }
    },
    initSpreadSheet: function () {
        // Create spreadsheet
        formula.setFormula({NEGATIVE});
        ctrlDashboard.worksheet = jspreadsheet(document.getElementById('spreadsheet'), {
            // toolbar: true,
            worksheets: [{
                data: ctrlDashboard.datasource,
                worksheetName : 'test1',
                worksheetId: '0',
                columns: [
                    { type: 'text', width: 50, readOnly: true, wordWrap: true },
                    { type: 'text', width: 120, readOnly: true, wordWrap: true },
                    { type: 'numeric', width: 120, readOnly: true, wordWrap: true },
                    { type: 'numeric', width: 120, readOnly: true, wordWrap: true },
                    { type: 'numeric', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', width: 120, readOnly: true, wordWrap: true },
                    { type: 'text', width: 120, readOnly: true, wordWrap: true },
                    { type: 'number', mask: '0%', readOnly: true, width: 50 },
                ],
            }],
            onbeforechange: function (instance, cell, x, y, value) {
                ctrlDashboard.tempBeforeChange = structuredClone(ctrlDashboard.datasource[y][x]);
            },
            onchange: function (instance, cell, x, y, value) {
                if(ctrlDashboard.tempBeforeChange !== value && ctrlDashboard.isChangeByBeRespons == false){
                    // console.log(ctrlDashboard.datasource)
                    cellName = jspreadsheet.helpers.getCellNameFromCoords(x, y);
                    console.log('New change on cell ' + cellName + ' from: ' + ctrlDashboard.tempBeforeChange + ' to: ' + value);
                    //call backend
                    ctrlDashboard.callBe(ctrlDashboard.datasource);
                }
            }
        })[0];
        // console.log(ctrlDashboard.worksheet);
        ctrlDashboard.worksheet.setStyle({'B5': 'background-color: #827f7f;color: #363434;',
            'C5': 'background-color: #827f7f;color: #363434;',
            'D5': 'background-color: #827f7f;color: #363434;',
            'E5': 'background-color: #827f7f;color: #363434;',
            'F5': 'background-color: #827f7f;color: #363434;',
            'G5': 'background-color: #827f7f;color: #363434;',
            'H5': 'background-color: #827f7f;color: #363434;',
            'I5': 'background-color: #827f7f;color: #363434;'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'C6': 'background-color: #e8f584;color: #363434;',
            'C7': 'background-color: #e8f584;color: #363434;',
            'C8': 'background-color: #e8f584;color: #363434;',
            'C9': 'background-color: #e8f584;color: #363434;',
            'D6': 'background-color: #e8f584;color: #363434;',
            'D7': 'background-color: #e8f584;color: #363434;',
            'D8': 'background-color: #e8f584;color: #363434;',
            'D9': 'background-color: #e8f584;color: #363434;'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'B10': 'background-color: #b79600;color: #363434;',
            'C10': 'background-color: #b79600;color: #363434;',
            'D10': 'background-color: #b79600;color: #363434;',
            'E10': 'background-color: #b79600;color: #363434;',
            'F10': 'background-color: #b79600; color: #8d0303;',
            'G10': 'background-color: #b79600;color: #363434;',
            'H10': 'background-color: #b79600; color: #8d0303;',
            'I10': 'background-color: #b79600;color: #363434;'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'E6': 'color: #363434;', 'E7': 'color: #4c4a4a;','E8': 'color: #4c4a4a;','E9': 'color: #4c4a4a', 'E10': 'color: #4c4a4a'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'F6': 'background-color: #a5e082; color: #4c4a4a', 'F7': 'background-color: #a5e082; color: #4c4a4a','F8': 'background-color: #a5e082; color: #4c4a4a','F9': 'background-color: #a5e082; color: #4c4a4a', 'F10': 'color: #4c4a4a'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'F6': 'background-color: #a5e082; color: #4c4a4a', 'F7': 'background-color: #a5e082; color: #4c4a4a','F8': 'background-color: #a5e082; color: #4c4a4a','F9': 'background-color: #a5e082; color: #4c4a4a', 'F10': 'color: #8d0303'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'G6': 'background-color: #a5e082; color: #4c4a4a', 'G7': 'background-color: #a5e082; color: #4c4a4a','G8': 'background-color: #a5e082; color: #4c4a4a','G9': 'background-color: #a5e082; color: #4c4a4a', 'G10': 'color: #4c4a4a'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'H6': 'background-color: #a5e082; color: #4c4a4a', 'H7': 'background-color: #a5e082; color: #4c4a4a','H8': 'background-color: #a5e082; color: #4c4a4a','H9': 'background-color: #a5e082; color: #4c4a4a', 'H10': 'color: #8d0303'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'I6': 'background-color: #a5e082; color: #4c4a4a'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'A3': 'color: #8d0303;'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'B1': 'background-color: #8d0303; color: #f4f0f0;'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'B3': 'background-color: #0f065a; color: #f4f0f0;',}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'A3': 'color: #8d0303;'}, null, null, true);
        ctrlDashboard.worksheet.setStyle({'B6': 'color: #363434;',
            'B7': 'color: #363434;',
            'B8': 'color: #363434;',
            'B9': 'color: #363434;'}, null, null, true);
        ctrlDashboard.worksheet.setMerge('A3', 0, 8);
        ctrlDashboard.worksheet.setMerge('B1', 8, 2);
        ctrlDashboard.worksheet.setMerge('B3', 8, 1);
        ctrlDashboard.worksheet.setMerge('I6', 0, 4);
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
                ctrlDashboard.isChangeByBeRespons = true;
                ctrlDashboard.worksheet.setValue('H6', res.H6, true);
                ctrlDashboard.worksheet.setValue('H7', res.H7, true);
                ctrlDashboard.worksheet.setValue('H8', res.H8, true);
                ctrlDashboard.worksheet.setValue('H9', res.H9, true);
                ctrlDashboard.worksheet.setValue('H10', res.H10, true);
                ctrlDashboard.isChangeByBeRespons = false;
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
