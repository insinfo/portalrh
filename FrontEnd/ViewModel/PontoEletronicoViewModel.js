$(function () {
    var pontoEletronicoViewModel = new PontoEletronicoViewModel();
    pontoEletronicoViewModel.init();
});

function PontoEletronicoViewModel() {
    this.webserviceJubarteBaseURL = WEBSERVICE_JUBARTE_BASE_URL;
    this.loaderApi = new LoaderAPI();
    this.restClient = new RESTClient();
    this.modalApi = window.location != window.parent.location ? window.parent.getModal() : new ModalAPI();
    this.mainNavbar = window.location != window.parent.location ? window.parent.getMainNavbar() : null;


    this.inputCPF = $('#inputCPF');
    this.inputNomePeFisica = $('#inputNomePeFisica');
    this.inputFiltroData = $('#inputFiltroData');
    this.inputLotacao = $('#inputLotacao');
    this.inputPIS = $('#inputPIS');
    this.inputEstadoCivil = $('#inputEstadoCivil');
    this.inputJornadaTrabalho = $('#inputJornadaTrabalho');
    /*

    this.inputFotoPerfil = $('#inputFotoPerfil');*/

    this.btnDownloadPDF = $('.btnDownloadPDF');
    this.btnImprimir = $('.btnImprimir');
    this.estratoPontoGrade = $('#estratoPontoGrade');
    this.tableExtratoPonto = $('#tableExtratoPonto');
    this.pontoDataToGrade = [];

}

PontoEletronicoViewModel.prototype.init = function () {
    var self = this;

    self.eventos();
    self.getPontoEletronicoGrade();
    self.getPontoEletronicoLista();
    self.getServidor();

    self.inputFiltroData.val(moment().format('L'));
    self.inputFiltroData.datepicker({
        "language": "pt-BR",
        "format": 'dd/mm/yyyy',
        "autoclose": true
    });

    /*self.estratoPontoGrade.fullCalendar({
        disableDragging: true,
        header: {
            left: 'prev,next',//prev,next
            center: 'title',
            right: 'today'//month,agendaWeek,agendaDay
        },
        defaultDate: moment().format('YYYY-MM-DD'),
        editable: true,
        events: self.pontoDataToGrade,
        lang: 'pt-br'
    });*/
};
PontoEletronicoViewModel.prototype.eventos = function () {
    var self = this;

    self.inputFiltroData.on('changeDate', function (t) {
        var selectedDate = moment($(this).val(), 'DD/MM/YYYY').format('YYYY-MM-DD');
        console.log(selectedDate);
        self.getPontoEletronicoGrade(selectedDate);
        self.getPontoEletronicoLista(selectedDate);
    });

    self.estratoPontoGrade.on('click','.fc-prev-button',function(){
        var selectedDate = self.estratoPontoGrade.fullCalendar('getDate');
        self.getPontoEletronicoGrade(selectedDate.format('YYYY-MM-DD'));
        self.getPontoEletronicoLista(selectedDate);
    });

    self.estratoPontoGrade.on('click','.fc-next-button',function(){
        var selectedDate = self.estratoPontoGrade.fullCalendar('getDate');
        self.getPontoEletronicoGrade(selectedDate.format('YYYY-MM-DD'));
        self.getPontoEletronicoLista(selectedDate);
    });

    self.btnImprimir.on('click',function () {
        self.imprimir();
    });

    self.btnDownloadPDF.on('click',function () {
        self.exportToPDF();
    });


};
PontoEletronicoViewModel.prototype.getServidor = function () {
    var self = this;

    self.loaderApi.show();
    self.restClient.setDataToSender({});
    self.restClient.setWebServiceURL(self.webserviceJubarteBaseURL + 'servidores/token');
    self.restClient.setMethodGET();
    self.restClient.setSuccessCallbackFunction(function (data) {
        self.loaderApi.hide();
        self.fillFormServidor(data);
    });
    self.restClient.setErrorCallbackFunction(function (callback) {
        self.modalApi.showModal(ModalAPI.ERROR, 'Sistemas', callback.responseJSON, 'OK');
        self.loaderApi.hide();
    });
    self.restClient.exec();

};
PontoEletronicoViewModel.prototype.getPontoEletronicoGrade = function (date) {
    var self = this;

    self.loaderApi.show();
    if (date) {
        self.restClient.setDataToSender({date: date});
    }
    self.restClient.setWebServiceURL(self.webserviceJubarteBaseURL + 'ponto/eletronico/marcacao/token');
    self.restClient.setMethodPOST();
    self.restClient.setSuccessCallbackFunction(function (data) {
        self.loaderApi.hide();
        var ponto = data['data'];
        var events = [];
        for (var i = 0; i < ponto.length; i++) {
            var item = ponto[i];
            events.push.apply(events, item['horarios'])
        }
        // Initialize calendar with options
        // self.estratoPontoGrade.empty();
        self.estratoPontoGrade.fullCalendar('destroy');
        self.estratoPontoGrade.fullCalendar({
            disableDragging: true,
            header: {
                left: 'prev,next',//prev,next today
                center: 'title',
                right: 'today'//'month,agendaWeek,agendaDay'//
            },
            defaultDate:data['now'],
            editable: false,
            events: events,
            lang: 'pt-br'
        });

        //self.estratoPontoGrade.fullCalendar('eventSource', self.pontoDataToGrade);
       // self.estratoPontoGrade.fullCalendar('removeEventSource');
        //self.estratoPontoGrade.fullCalendar('gotoDate', data['now']);
       // self.estratoPontoGrade.fullCalendar('refetchEvents');

    });
    self.restClient.setErrorCallbackFunction(function (callback) {
        self.modalApi.showModal(ModalAPI.ERROR, 'Sistemas', callback.responseJSON, 'OK');
        self.loaderApi.hide();
    });
    self.restClient.exec();

};
PontoEletronicoViewModel.prototype.getPontoEletronicoLista = function (date) {
    var self = this;

    var columnsConfiguration = [
        {"key": "dia"},
        {"key": "entrada1"},
        {"key": "saida1"},
        {"key": "entrada2"},
        {"key": "saida2"},
        {"key": "entrada3"},
        {"key": "saida3"},
        {"key": "entrada4"},
        {"key": "saida4"}
    ];
    self.dataTableExtratoPonto = new ModernDataTable('tableExtratoPonto');
    if (date) {
        self.dataTableExtratoPonto.setDataToSender({date: date});
    }
    self.dataTableExtratoPonto.setRecordsPerPage(31);
    self.dataTableExtratoPonto.hideTableFooter();
    self.dataTableExtratoPonto.hideTableHeader();
    self.dataTableExtratoPonto.setDisplayCols(columnsConfiguration);
    self.dataTableExtratoPonto.hideActionBtnDelete();
    self.dataTableExtratoPonto.hideRowSelectionCheckBox();
    self.dataTableExtratoPonto.setIsColsEditable(false);

    self.dataTableExtratoPonto.setSourceURL(self.webserviceJubarteBaseURL + 'ponto/eletronico/marcacao/token');
    self.dataTableExtratoPonto.setSourceMethodPOST();
    self.dataTableExtratoPonto.setOnClick(function (data) {
    });
    self.dataTableExtratoPonto.load();
};
PontoEletronicoViewModel.prototype.fillFormServidor = function (data) {
    var self = this;

    var pessoa = data['pessoa']['fisica'];
    var enderecos = data['pessoa']['enderecos'];
    var telefones = data['pessoa']["telefones"];
    var cargaHoraria = data['cargaHoraria'];
    var servidor = data['servidor'];

    if (servidor) {
        //servidor[0][nomeLocalTrabalho]
        var matricula = servidor[0]['matricula'];
        self.inputJornadaTrabalho.val(matricula['idJornadaTrabalho']);
        self.inputLotacao.val(servidor[0]['nomeLotacao']);

    }
    if (pessoa) {
        self.inputNomePeFisica.val(pessoa['nome']);
        self.inputCPF.val(pessoa['cpf']);
        self.inputPIS.val(pessoa['pis']);
        self.inputEstadoCivil.val(pessoa['estadoCivil']);
    }
};
PontoEletronicoViewModel.prototype.imprimir = function () {
    var self = this;

    var body = $('body');
    body.find("iframe[name='print_frame']").remove();
    body.append('<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>');
    var frame = body.find("iframe[name='print_frame']");

    var style = '<style> *{font-family:Arial,Verdana; font-size: 11px; color:#000} table thead tr th{padding:10px 5px;background-color:#ccc} table tbody tr:nth-child(odd){background-color:#ddd}table tbody tr:nth-child(even){background-color:#fff} table tbody tr td{padding:5px}table tr th{text-align:left;font-weight:700;color:#000} </style>';

    frame.contents().find('head').append(style);
    frame.contents().find('body').html(self.tableExtratoPonto[0].outerHTML);
    frame.focus();
    window.frames["print_frame"].window.onbeforeprint = function(){
        //console.log('onbeforeprint');
    };
    window.frames["print_frame"].window.onafterprint = function(){
        //console.log('onafterprint');
        body.find("iframe[name='print_frame']").remove();
    };
    window.frames["print_frame"].window.print();
};

PontoEletronicoViewModel.prototype.exportToPDF = function (){
    var self = this;

    var fileName = 'pontoEletronico.pdf';
    var table = self.tableExtratoPonto.clone();

    table = table[0];

    var doc = new jsPDF('p');// "l" = landscape "p" = portrait
    //doc.text("From HTML", 14, 16);
    var res = doc.autoTableHtmlToJson(table);

    doc.autoTable(res.columns, res.data, {
        startY: 10,//doc.autoTable.previous.finalY + 15,
        margin: {horizontal: 7},
        bodyStyles: {valign: 'top'},
        styles: {overflow: 'linebreak', columnWidth: 'wrap'},
        columnStyles: {text: {columnWidth: 'auto'}}
    });
    doc.save(fileName);


};