<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jubarte - Prefeitura Municipal de Rio das Ostras - RJ</title>

    <!-- ESTILO LIMITLESS -->
    <link href="/cdn/Assets/fonts/material-icons/material-icons.css" rel="stylesheet">
    <link href="/cdn/Assets/fonts/roboto/roboto.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/core.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/components.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Vendor/limitless/material/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /ESTILO LIMITLESS -->

    <!-- JS CORE LIMITLESS -->
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/notifications/jgrowl.min.js"></script>
    <!-- /JS CORE LIMITLESS -->

    <!-- DEPENDEICIAS JUBARTE -->
    <link href="/cdn/Assets/css/jubarteStyle.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/jSwitch.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/jCheckBox.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/modernDataTable.css" rel="stylesheet" type="text/css"/>
    <link href="/cdn/Assets/css/ModernTreeView.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/cdn/Vendor/select2/4.0.6/select2.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/bootstrap-select-1.12.4/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/bootstrap-select-1.12.4/defaults-pt_BR.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/cropperjs/1.3.5/cropper.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/cropperjs/1.3.5/jQueryCropper.js"></script>

    <link href="/cdn/Vendor/bootstrap-datepicker/1.7.1/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/cdn/Vendor/bootstrap-datepicker/1.7.1/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js"></script>

    <script type="text/javascript" src="/cdn/Vendor/moment/2.19.1/moment.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/moment/2.19.1/locale/pt-br.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="/cdn/Vendor/limitless/material/js/plugins/ui/fullcalendar/lang/pt-br.js"></script>
    <script type="text/javascript" src="/cdn/utils/jTimeline.js"></script>
    <link href="/cdn/Assets/css/jTimeline.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/ModernTreeView.css" rel="stylesheet" type="text/css">
    <link href="/cdn/Assets/css/FullCalendar.css" rel="stylesheet" type="text/css">

    <!-- DEPENDECIAS DA VIEW MODEL -->
    <script type="text/javascript" src="/cdn/utils/utils.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernBlockUI.js"></script>
    <script type="text/javascript" src="/cdn/utils/jubarte.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModalAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/LoaderAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/RESTClient.js"></script>
    <script type="text/javascript" src="/cdn/utils/FormValidationAPI.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernDataTable.js"></script>
    <script type="text/javascript" src="/cdn/utils/ModernTreeView.js"></script>

    <!-- VIEW MODEL -->
    <script type="text/javascript" src="/ViewModel/Constants.js"></script>
    <script type="text/javascript" src="/ViewModel/JustificaPontoViewModel.js"></script>

</head>
<body>
<!-- /page container -->
<div class="containerInsideIframe">
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4><i class="icon-alarm position-left"></i> <span class="text-semibold">Justificar Ponto Eletrônico</span></h4>
                            <ul class="breadcrumb position-right">
                            </ul>
                        </div>

                        <div class="heading-elements">
                            <div class="heading-btn-group">
                                <button class="btn bg-orange btn-labeled heading-btn legitRipple">
                                    <b><i class="icon-file-plus"></i></b>Adicionar Justificativa
                                </button>
                                <button class="btnDownloadPDF btn bg-blue btn-labeled heading-btn legitRipple">
                                    <b><i class="icon-file-pdf"></i></b>Download PDF
                                </button>
                                <button class="btnImprimir btn bg-indigo btn-labeled heading-btn legitRipple">
                                    <b><i class="icon-printer"></i></b>Imprimir
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->

                <!-- Content area -->
                <div class="content">


                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                            <div class="panel panel-flat">

                                <!-- form Pessoa -->
                                <div id="formPessoa" class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">


                                                    <div class="col-md-3 inputBlock">
                                                        <label>CPF</label>
                                                        <div class="input-group">
                                                            <input id="inputCPF" type="text" class="form-control" required="" data-type="cpf" data-visited="false" maxlength="14">
                                                            <span id="btnShowModalListaServidor" data-toggle="modal" data-target="#modalListaServidor" class="input-group-addon cursor-pointer btnHover">
                                                                <i class="icon-search4"></i>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3 inputBlock">
                                                        <label>Nome</label>
                                                        <input id="inputNomePeFisica" type="text" class="form-control" disabled data-type="string">
                                                    </div>
                                                    <div class="col-md-3 inputBlock">
                                                        <label>Lotação</label>
                                                        <input id="inputLotacao" type="text" class="form-control" disabled data-type="string">
                                                    </div>
                                                    <div class="col-md-3  text-right">
                                                        <i class="icon-calendar2" style="position: relative;width:50px;top: 0;left: 5px;background-color: #689F38;color: #ffffff;line-height: 1;padding: 11px;border-bottom-left-radius: 3px;border-top-left-radius: 3px;padding-right: 15px;"></i>
                                                        <input id="inputFiltroData" type="button" class="btn bg-green heading-btn text-regular legitRipple" value="">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /form Pessoa -->

                                <div class="tabbable">
                                    <ul class="nav nav-tabs " id="tabNavigation">
                                        <li class="active">
                                            <a href="#tabExtratoAgendaBiometria" data-toggle="tab" class="legitRipple"
                                               aria-expanded="true">Extrato Ponto Grade</a>
                                        </li>
                                        <li class="">
                                            <a href="#tabExtratoListaBiometria" data-toggle="tab" class="legitRipple"
                                               aria-expanded="false">Extrato Ponto Lista</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabExtratoAgendaBiometria">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Calendar -->
                                                    <div class=""><!-- panel panel-flat -->
                                                        <!--<div class="panel-heading">
                                                            <h6 class="panel-title"></h6>
                                                        </div>-->

                                                        <div class="" style="display: block;"><!-- panel-body -->
                                                            <div id="estratoPontoGrade"></div>
                                                        </div>
                                                    </div>
                                                    <!-- /calendar -->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="tabExtratoListaBiometria"><!--  -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- DataTable -->
                                                    <div class=""><!--panel panel-flat-->
                                                        <!--<div class="panel-heading">
                                                            <h6 class="panel-title"></h6>
                                                        </div>-->
                                                        <div class="panel-body no-padding">
                                                            <!-- ModernDataTable -->
                                                            <div class="modernDataTable">
                                                                <table id="tableExtratoPonto" cellspacing="0" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Dia</th>
                                                                        <th>Entrada 1</th>
                                                                        <th>Saída 1</th>
                                                                        <th>Entrada 2</th>
                                                                        <th>Saída 2</th>
                                                                        <th>Entrada 3</th>
                                                                        <th>Saída 3</th>
                                                                        <th>Entrada 4</th>
                                                                        <th>Saída 4</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody></tbody>
                                                                </table>
                                                            </div><!-- Fim ModernDataTable -->
                                                        </div>
                                                    </div>
                                                    <!-- /DataTable -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <!-- /FORMS -->
                </div>

                <!-- Footer -->
                <div class="footer text-muted">

                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
</div>
<!-- /page container -->

<!-- modalListaServidor -->
<div id="modalListaServidor" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-large">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Lista de Servidores</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 inputBlock">
                        <label></label>
                        <select id="selectGrupoRep" name="selectGrupoRep" class="form-control select2" data-placeholder="Selecione o sistema" required="">
                            <option value="Selecione">Selecione</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="modernDataTable">
                            <table id="tableListServidores" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nome</th>
                                    <th>Data Nascimento</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Lotação</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modalListaServidor -->

<!--<div id="modalJustificar" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-large">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Justificar</h6>
            </div>

            <div class="modal-body">

                <div class="form-horizontal" id="formJustificar">

                    <div class="form-group">
                        <div class="col-sm-4 inputBlock">
                            <label>Data</label>
                            <input type="text" class="form-control" readonly placeholder="01/01/2018">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Entrada 1</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Saída 1</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Entrada 2</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Saída 2</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Entrada 3</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Saída 3</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Entrada 4</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-1 col-md-1-extra8 inputBlock">
                            <label>Saída 4</label>
                            <input type="text" class="form-control" placeholder="00:00">
                        </div>


                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 inputBlock">
                            <label>Motivo</label>
                            <select class="form-control select select2">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-12">
                            Observação
                        </label>
                        <div class="col-sm-12">
                            <textarea id="textareaObservacaoJustificativa" name="textareaObservacaoJustificativa" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button id="btnEnviarJustificativa" class="btn bg-blue legitRipple">
                            Enviar
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>-->

<div id="modalJustificarGrade" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-large">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Justificar - <span class="spanDataSelecionada">17/09/2018</span></h6>
            </div>

            <div class="modal-body">
                <!-- modal content -->

                <div class="form-horizontal" id="formJustificar">

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Entrada 1</label>
                            <input name="entrada1" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoEntrada1" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoEntrada1" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Saída 1</label>
                            <input name="saida1" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoSaida1" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoSaida1" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Entrada 2</label>
                            <input name="entrada2" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoEntrada2" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoEntrada2" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Saída 2</label>
                            <input name="saida2" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoSaida2" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoSaida2" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Entrada 3</label>
                            <input name="entrada3" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoEntrada3" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoEntrada3" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Saída 3</label>
                            <input name="saida3" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoSaida3" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoSaida3" class="form-control" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Entrada 4</label>
                            <input name="entrada4" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoEntrada4" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoEntrada4" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2 inputBlock">
                            <label>Saída 4</label>
                            <input name="saida4" type="text" class="form-control" placeholder="00:00">
                        </div>
                        <div class="col-md-2 inputBlock">
                            <label>Motivo</label>
                            <select name="motivoSaida4" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Inacessível">Inacessível</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observação</label>
                            <textarea rows="1" name="observacaoSaida4" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button id="btnEnviarJustificativa" class="btn bg-blue legitRipple">
                            Salvar
                        </button>
                    </div>

                </div>

                <!-- fim modal content -->
            </div>
        </div>
    </div>
</div>

<div id="modalJustificarLista" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Justificar</h6>
            </div>

            <div class="modal-body">
                <!-- modal content -->

                <div class="form-horizontal" id="formJustificar">

                    <div class="form-group">
                        <div class="col-sm-4 inputBlock">
                            <label>Data</label>
                            <input name="modalListaDataJustificada" type="text" class="form-control" readonly placeholder="01/01/2018">
                        </div>

                        <div class="col-sm-4 inputBlock">
                            <label>Tipo de Marcação</label>
                            <select name="modalListaTipoMarcacao"  class="form-control select select2">
                                <option value="">Selecione</option>
                                <option value="Entrada 1">Entrada 1</option>
                                <option value="Saida 1">Saída 1</option>
                                <option value="Entrada 2">Entrada 2</option>
                                <option value="Saida 2">Saída 2</option>
                                <option value="Entrada 3">Entrada 3</option>
                                <option value="Saida 3">Saída 3</option>
                                <option value="Entrada 4">Entrada 4</option>
                                <option value="Saida 4">Saída 4</option>
                            </select>
                        </div>

                        <div class="col-sm-4 inputBlock">
                            <label>Horário</label>
                            <input name="modalListaHoraJustificada" type="text" class="form-control" placeholder="00:00">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 inputBlock">
                            <label>Motivo</label>
                            <select name="modalListaMotivoJustificada" class="form-control select select2">
                                <option value="">Selecione</option>
                                <option value="Atestado">Atestado</option>
                                <option value="Licença Médica">Licença Médica</option>
                                <option value="Não Marcou">Não Marcou</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12">
                            Observação
                        </label>
                        <div class="col-sm-12">
                            <textarea name="modalListaObservacaoJustificada" class="form-control" ></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button id="modalListaBtnSalvarJustificada" class="btn bg-blue legitRipple">
                            Salvar
                        </button>
                    </div>

                </div>

                <!-- fim modal content -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
