
Morris.Donut({
    element: 'donut_pendidikan',
    data: [{
        label: 'SMA',
        value: 25
    }, {
            label: 'Diploma',
            value: 40
        }, {
            label: 'Sarjana',
            value: 25
        }, {
            label: 'Magister',
            value: 10
        }],
    colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
    formatter: function (y) {
        return y + '%'
    }
});

Morris.Donut({
    element: 'donut_lulusan',
    data: [{
        label: 'UI',
        value: 25
    }, {
            label: 'Unas',
            value: 40
        }, {
            label: 'ITB',
            value: 25
        }, {
            label: 'UNJ',
            value: 10
        }],
    colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
    formatter: function (y) {
        return y + '%'
    }
});

Morris.Donut({
    element: 'donut_bidang',
    data: [{
        label: 'Programer',
        value: 25
    }, {
            label: 'HRD',
            value: 40
        }, {
            label: 'Analis',
            value: 25
        }, {
            label: 'Designer',
            value: 10
        }],
    colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
    formatter: function (y) {
        return y + '%'
    }
});

Morris.Donut({
    element: 'donut_pengalaman',
    data: [{
        label: 'Freshgrade',
        value: 25
    }, {
            label: '1 - 3 tahun',
            value: 40
        }, {
            label: '3 - 7 tahun',
            value: 25
        }, {
            label: 'diatas 7 tahun',
            value: 10
        }],
    colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
    formatter: function (y) {
        return y + '%'
    }
});