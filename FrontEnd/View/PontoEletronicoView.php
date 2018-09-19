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
    <script type="text/javascript" src="/ViewModel/PontoEletronicoViewModel.js"></script>

    <style>
        .img-container {
            text-align: center;
            width: 100%;
            max-height: 320px;
            min-height: 320px;
        }

        .img-container > img {
            max-width: 100%;
        }

        .img-preview {
            background: grey;
            z-index: 2;
            position: relative;
            top: -320px;
            left: 0;
            text-align: center;
            width: 70px;
            height: 70px;
            overflow: hidden;
        }

        .img-preview > img {
            max-width: 100%;
        }
    </style>
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
                            <h4><i class="icon-alarm position-left"></i> <span class="text-semibold">Ponto Eletrônico</span></h4>
                            <ul class="breadcrumb position-right">
                            </ul>
                        </div>

                        <div class="heading-elements">
                            <div class="heading-btn-group">
                                <button class="btnDownloadPDF btn bg-orange btn-labeled heading-btn legitRipple">
                                    <b><i class="icon-file-pdf"></i></b>Download PDF
                                </button>
                                <button class="btnImprimir btn bg-blue btn-labeled heading-btn legitRipple">
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
                                                    <div class="col-md-2 inputBlock">
                                                        <label>CPF</label>
                                                        <input id="inputCPF" type="text" class="form-control" disabled data-type="cpf">
                                                    </div>
                                                    <div class="col-md-3 inputBlock">
                                                        <label>Nome</label>
                                                        <input id="inputNomePeFisica" type="text" class="form-control" disabled data-type="string">
                                                    </div>
                                                    <div class="col-md-4 inputBlock">
                                                        <label>Lotação</label>
                                                        <input id="inputLotacao" type="text" class="form-control" disabled data-type="string">
                                                    </div>
                                                    <div class="col-md-3  text-right">
                                                        <i class="icon-calendar2" style="position: relative;width:50px;top: 0;left: 5px;background-color: #689F38;color: #ffffff;line-height: 1;padding: 11px;border-bottom-left-radius: 3px;border-top-left-radius: 3px;padding-right: 15px;"></i>
                                                        <input id="inputFiltroData" type="button" class="btn bg-green heading-btn text-regular legitRipple" value="">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2 inputBlock">
                                                        <label>PIS</label>
                                                        <input id="inputPIS" type="text" class="form-control"  disabled>
                                                    </div>
                                                    <div class="col-md-3 inputBlock">
                                                        <label>Estado Civil</label>
                                                        <input id="inputEstadoCivil" type="text" class="form-control"  disabled>
                                                    </div>
                                                    <div class="col-md-3 inputBlock">
                                                        <label>Jornada de Trabalho</label>
                                                        <input id="inputJornadaTrabalho" type="text" class="form-control"  disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="col-md-2">
                                            <div id="inputFotoPerfil" class="inputFotoContainer">
                                                <div  class="inputUserFoto">
                                                    <img src="/cdn/Assets/icons/userNoImage.jpg">
                                                </div>
                                            </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- /form Pessoa -->

                            <div class="tabbable">
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a id="btnShowTabCadPessoa" href="#tabExtratoAgendaBiometria" data-toggle="tab" class="legitRipple"
                                           aria-expanded="true">Extrato Ponto Grade</a>
                                    </li>
                                    <li class="">
                                        <a id="btnShowTabListaPessoaFisica" href="#tabExtratoListaBiometria" data-toggle="tab" class="legitRipple"
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
                    <div class="text-right">
                        <button class="btn bg-orange btn-labeled heading-btn legitRipple">
                            <b><i class="icon-file-pdf"></i></b>Download PDF
                        </button>
                        <button class="btn bg-blue btn-labeled heading-btn legitRipple">
                            <b><i class="icon-printer"></i></b>Imprimir
                        </button>
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

<!-- modalGetFoto -->
<div id="modalGetFoto" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-medium">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Obter Foto</h6>
            </div>
            <div class="modal-body">
                <div class="fluid-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="sizeWebCam" id="videoWebCamView">
                                <div style="padding-top: 111px;">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M1.2,4.47L2.5,3.2L20,20.72L18.73,22L16.73,20H4A2,2 0 0,1 2,18V6C2,5.78 2.04,5.57 2.1,5.37L1.2,4.47M7,4L9,2H15L17,4H20A2,2 0 0,1 22,6V18C22,18.6 21.74,19.13 21.32,19.5L16.33,14.5C16.76,13.77 17,12.91 17,12A5,5 0 0,0 12,7C11.09,7 10.23,7.24 9.5,7.67L5.82,4H7M7,12A5,5 0 0,0 12,17C12.5,17 13.03,16.92 13.5,16.77L11.72,15C10.29,14.85 9.15,13.71 9,12.28L7.23,10.5C7.08,10.97 7,11.5 7,12M12,9A3,3 0 0,1 15,12C15,12.35 14.94,12.69 14.83,13L11,9.17C11.31,9.06 11.65,9 12,9Z"/>
                                    </svg>
                                    <p>Câmera desligada ou inexistente!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-container" id="canvasPhotoView">
                                <img id="imgPhotoEditor" src="/cdn/Assets/icons/userNoImage.jpg" alt="Fotografia">
                                <div class="img-preview" id="photoPreview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-20 tdLeft2">
                            <button id="btnOnWebCam" type="button" class="btn bg-orange btn-sm btn-labeled btn-labeled-right heading-btn">
                                Ligar WebCam<b><i class="icon-video-camera"></i></b>
                            </button>
                            <button id="btnTakePhoto" type="button" class="btn bg-blue btn-sm btn-labeled btn-labeled-right heading-btn">
                                Fotografar<b><i class="icon-camera"></i></b>
                            </button>
                        </div>
                        <div class="col-md-6 mt-20 text-right tdRight2">
                            <label for="inputFileSelectPhoto" class="btn bg-blue btn-sm btn-labeled btn-labeled-right heading-btn">
                                Selecionar Arquivo<b><i class="icon-image2"></i></b>
                            </label>
                            <input id="inputFileSelectPhoto" type="file" style="display: none;"/>
                            <button id="btnAddPhoto" type="button" class="btn bg-indigo btn-sm btn-labeled btn-labeled-right heading-btn">
                                Salvar<b><i class="icon-arrow-right14"></i></b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modalGetFoto -->

</body>
</html>
