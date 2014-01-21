<?php use_helper('Date') ?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1073786111 1 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-priority:99;
	mso-style-link:"Encabezado Car";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 220.95pt right 441.9pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-priority:99;
	mso-style-link:"Pie de página Car";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 220.95pt right 441.9pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
a:link, span.MsoHyperlink
	{mso-style-priority:99;
	mso-style-parent:"";
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-noshow:yes;
	mso-style-priority:99;
	color:purple;
	mso-themecolor:followedhyperlink;
	text-decoration:underline;
	text-underline:single;}
p.MsoPlainText, li.MsoPlainText, div.MsoPlainText
	{mso-style-priority:99;
	mso-style-link:"Texto sin formato Car";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:Calibri;
	mso-fareast-language:EN-US;}
p
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Texto de globo Car";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:Tahoma;
	mso-fareast-language:EN-US;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:36.0pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:36.0pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-fareast-font-family:Calibri;
	mso-bidi-font-family:"Times New Roman";
	mso-fareast-language:EN-US;}
span.EncabezadoCar
	{mso-style-name:"Encabezado Car";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Encabezado;}
span.PiedepginaCar
	{mso-style-name:"Pie de página Car";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Pie de página";}
span.TextodegloboCar
	{mso-style-name:"Texto de globo Car";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"Texto de globo";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
span.TextosinformatoCar
	{mso-style-name:"Texto sin formato Car";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"Texto sin formato";
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-hansi-font-family:Calibri;
	mso-bidi-font-family:Calibri;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-fareast-font-family:Calibri;
	mso-hansi-font-family:Calibri;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("EDUCACION%20FISICA_FERNANDO%20RODRIGUEZ_archivos/header.htm") fs;
	mso-footnote-continuation-separator:url("EDUCACION%20FISICA_FERNANDO%20RODRIGUEZ_archivos/header.htm") fcs;
	mso-endnote-separator:url("EDUCACION%20FISICA_FERNANDO%20RODRIGUEZ_archivos/header.htm") es;
	mso-endnote-continuation-separator:url("EDUCACION%20FISICA_FERNANDO%20RODRIGUEZ_archivos/header.htm") ecs;}
@page WordSection1
	{size:612.0pt 792.0pt;
	margin:70.85pt 3.0cm 70.85pt 3.0cm;
	mso-header-margin:35.4pt;
	mso-footer-margin:35.4pt;
	mso-header:url("EDUCACION%20FISICA_FERNANDO%20RODRIGUEZ_archivos/header.htm") h1;
	mso-footer:url("EDUCACION%20FISICA_FERNANDO%20RODRIGUEZ_archivos/header.htm") f1;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 @list l0
	{mso-list-id:1236208222;
	mso-list-type:hybrid;
	mso-list-template-ids:1819307930 873070607 873070617 873070619 873070607 873070617 873070619 873070607 873070617 873070619;}
@list l0:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l0:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l0:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l0:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l0:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l0:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l0:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l0:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;}
@list l0:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l1
	{mso-list-id:2018192374;
	mso-list-type:hybrid;
	mso-list-template-ids:-1381305322 873070593 873070595 873070597 873070593 873070595 873070597 873070593 873070595 873070597;}
@list l1:level1
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:71.4pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l1:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:107.4pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l1:level3
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:143.4pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l1:level4
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:179.4pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l1:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:215.4pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l1:level6
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:251.4pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
@list l1:level7
	{mso-level-number-format:bullet;
	mso-level-text:\F0B7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:287.4pt;
	text-indent:-18.0pt;
	font-family:Symbol;}
@list l1:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:323.4pt;
	text-indent:-18.0pt;
	font-family:"Courier New";}
@list l1:level9
	{mso-level-number-format:bullet;
	mso-level-text:\F0A7;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:359.4pt;
	text-indent:-18.0pt;
	font-family:Wingdings;}
ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
#header { position: fixed; left: 0px; top: 900px; right: 0px; height: 22px; background-color: #9bb0c9; text-align: left;  color: white; padding-left:5px; padding-top: 7px;}
#header span{
  text-transform: uppercase; 
}
#codigo_proyecto { position: fixed; left: 400px; top: -70px; right: 0px; }
#logo_pucv{ position: fixed; top: -80px; right: 500px}

#di_vertical{ position: fixed; top: 400px; right: 610px}
</style>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>

<body lang=ES-CL link=blue vlink=purple style='tab-interval:35.4pt'>

<div class=WordSection1>
<img id="logo_pucv" src="/home/sfprojects/postulacion_interna_di/web/images/logo_pucv_ 85_chico.jpg" width="150" height="83"></img>
<img id="di_vertical" src="/home/sfprojects/postulacion_interna_di/web/images/DI_vertical.PNG" width="70"></img>
<div id='header' class='MsoNormal'><span>VICERRECTORÍA DE INVESTIGACIÓN Y ESTUDIO AVANZADOS</span></div>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;'><b style='mso-bidi-font-weight:normal'><span
style='font-size:12.0pt;mso-bidi-font-size:11.0pt;text-decoration: underline;' >CONVENIO DE DESEMPEÑO<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal;'><span
style='font-size:12.0pt;mso-bidi-font-size:11.0pt;text-decoration: underline;'>PROYECTO 
<?php if($postulacion->getConcurso()->getAcronimo() == 'di_pia'):?>
  <?php if($postulacion->getPersona()->getTipoProfesor()->getNumeroTipo() == 1):?>
    <?php echo strtoupper($postulacion->getConcurso()->getNombreConcurso().' - INICIACIÓN')?><o:p></o:p></span></b></p>
  <?php else:?>
    <?php echo strtoupper($postulacion->getConcurso()->getNombreConcurso().' - REGULAR')?><o:p></o:p></span></b></p>
  <?php endif;?>
<?php else:?>
  <?php echo strtoupper($postulacion->getConcurso()->getNombreConcurso())?><o:p></o:p></span></b></p>
<?php endif;?>

<br />

<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><i style='mso-bidi-font-style:normal'><span lang=ES style='mso-ansi-language:
ES'>"<?php echo $postulacion->getTitulo()?>"</span><o:p></o:p></i></b></p>

<?php if($postulacion->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'):?>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal;tab-stops:163.75pt 253.75pt'><a name="OLE_LINK2"></a><a
  name="OLE_LINK1"><span style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:
  "Times New Roman";color:black;mso-fareast-language:ES-CL;text-transform: capitalize;'>Tesista: <?php echo $postulacion->getTesista()->getNombre()?> <?php echo $postulacion->getTesista()->getApellido1()?> <?php echo substr($postulacion->getTesista()->getApellido2(),0,1)?>.</span></span></a></p>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal;tab-stops:163.75pt 253.75pt'><a name="OLE_LINK2"></a><a
  name="OLE_LINK1"><span style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:
  "Times New Roman";color:black;mso-fareast-language:ES-CL;text-transform: capitalize;'>Profesor Guía: <?php echo $postulacion->getPersona()->getNombre()?> <?php echo $postulacion->getPersona()->getApellido1()?> <?php echo substr($postulacion->getPersona()->getApellido2(),0,1)?>.</span></span></a></p>
<?php else:?>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal;tab-stops:163.75pt 253.75pt'><a name="OLE_LINK2"></a><a
  name="OLE_LINK1"><span style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:
  "Times New Roman";color:black;mso-fareast-language:ES-CL;text-transform: capitalize;'>Responsable: <?php echo $postulacion->getPersona()->getNombre()?> <?php echo $postulacion->getPersona()->getApellido1()?> <?php echo substr($postulacion->getPersona()->getApellido2(),0,1)?>.</span></span></a></p>
<?php endif;?>
<p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
line-height:normal;tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:OLE_LINK1'><span
style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:"Times New Roman";
color:black;mso-fareast-language:ES-CL'><?php echo $postulacion->getPersona()->getUnidadAcademica()?><o:p></o:p></span></span></span></p>

<p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
line-height:normal;tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:OLE_LINK1'><span
style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:"Times New Roman";
color:black;mso-fareast-language:ES-CL; text-transform: uppercase; font-weight:bold;'>Cod. Proyecto: <?php echo $postulacion->getCodigoProyecto()?><o:p></o:p></span></span></span></p>


<br />
<br />
<?php if($postulacion->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'):?>
<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:2.75pt;margin-bottom:.0001pt;text-align:justify;line-height:normal;
tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:OLE_LINK1'><span
style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:"Times New Roman";
color:black;mso-fareast-language:ES-CL'>En Valparaíso, a <b style='mso-bidi-font-weight:
normal'> <?php echo format_datetime($postulacion->getConvenio()->getFechaConvenio(), 'D', 'es_CL')?></b>, se establece el presente convenio entre <?php if($postulacion->getPersona()->getSexo() == 'M'):?>el Profesor guía de tesis
<?php else:?>la Profesora guía de tesis<?php endif;?>, <?php if($postulacion->getTesista()->getSexo() == 'M'):?>el alumno de tesis doctoral<?php else:?>la alumna de tesis doctoral<?php endif;?> y la Dirección de Investigación (DI), quienes firman
aceptando las condiciones de adjudicación de recursos y compromisos adquiridos.<o:p></o:p></span></span></span></p>
<br />
<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:
OLE_LINK1'><span style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:
"Times New Roman";color:black;mso-fareast-language:ES-CL'><?php if($postulacion->getTesista()->getSexo() == 'M'):?>El alumno de tesis doctoral
<?php else:?>La alumna de tesis doctoral<?php endif;?> se compromete <b style='mso-bidi-font-weight:normal'> como mínimo</b>, al cumplimiento total de los siguientes compromisos:<o:p></o:p></span></span></span></p>
<?php else:?>
<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:2.75pt;margin-bottom:.0001pt;text-align:justify;line-height:normal;
tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:OLE_LINK1'><span
style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:"Times New Roman";
color:black;mso-fareast-language:ES-CL'>En Valparaíso, a <b style='mso-bidi-font-weight:
normal'> <?php echo format_datetime($postulacion->getConvenio()->getFechaConvenio(), 'D', 'es_CL')?></b>, se establece el presente convenio entre <?php if($postulacion->getPersona()->getSexo() == 'M'):?>el Investigador
<?php else:?>la Investigadora<?php endif;?> Responsable del proyecto y la Dirección de Investigación (DI), quienes firman
aceptando las condiciones de adjudicación de recursos y compromisos adquiridos.<o:p></o:p></span></span></span></p>
<br />
<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:
OLE_LINK1'><span style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:
"Times New Roman";color:black;mso-fareast-language:ES-CL'><?php if($postulacion->getPersona()->getSexo() == 'M'):?>El Investigador
<?php else:?>La Investigadora<?php endif;?> Responsable
se compromete <b style='mso-bidi-font-weight:normal'> como mínimo</b>, al cumplimiento total de los siguientes compromisos:<o:p></o:p></span></span></span></p>

<?php endif;?>

<br />

<div align=center>

<table  class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 
 style='margin-left: 2.75pt;width:100%;border-collapse:collapse;
 border:none;mso-border-alt:solid black .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
 0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid black;mso-border-insidev:
 .5pt solid black'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=553 style='width:414.55pt;border:solid black 1.0pt;mso-border-alt:
  solid black .5pt;background:#4F81BD;mso-shading:windowtext;mso-pattern:gray-10 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:6.0pt;text-align:center'><span
  style='mso-bookmark:OLE_LINK1'><span style='mso-bookmark:OLE_LINK2'><b
  style='mso-bidi-font-weight:normal; color: white;'>COMPROMISOS ADQUIRIDOS<o:p></o:p></b></span></span></p>
  </td>
  <span style='mso-bookmark:OLE_LINK1'><span style='mso-bookmark:OLE_LINK2'></span></span>
 </tr>
 <?php foreach($postulacion->getConvenio()->getCompromisosDeConvenio() as $compromiso):?>
 <tr style='mso-yfti-irow:1;height:24.8pt'>
  <td width=553 style='width:414.55pt;border:solid black 1.0pt;border-top:none;
  mso-border-top-alt:solid black .5pt;mso-border-alt:solid black .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:24.8pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal;tab-stops:163.75pt 253.75pt'><span
  style='mso-bookmark:OLE_LINK1'><?php echo $compromiso->getTextoCompromiso()?></p>
  </td>
  <span style='mso-bookmark:OLE_LINK1'><span style='mso-bookmark:OLE_LINK2'></span></span>
 </tr>
 <?php endforeach;?>

</table>

</div>

<br />
<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
margin-left:2.75pt;margin-bottom:.0001pt;text-align:justify;line-height:normal;
tab-stops:163.75pt 253.75pt'><span style='mso-bookmark:OLE_LINK1'><span
style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:"Times New Roman";
color:black;mso-fareast-language:ES-CL'>El cumplimiento de los compromisos
adquiridos será verificado mediante un informe final que deberá ser entregado
al término del año de ejecución del proyecto (<b style='mso-bidi-font-weight:
normal'>a más tardar el</b> <b style='mso-bidi-font-weight:normal'> <?php echo format_datetime($postulacion->getConcurso()->getConvocatoria()->getFechaTerminoConvenio(), 'D', 'es_CL')?></b>), manteniéndose vigente
el proyecto hasta el </span></span></span><span style='mso-bookmark:OLE_LINK1'><span
style='mso-bookmark:OLE_LINK2'><span style='mso-fareast-font-family:"Times New Roman";
mso-fareast-language:ES-CL'> cumplimiento total de las metas comprometidas.<o:p></o:p></span></span></span></p>

<span style='mso-bookmark:OLE_LINK2'></span><span style='mso-bookmark:OLE_LINK1'></span>


<br><table style='page-break-after:always;'></br></table><br>

<div id='header' class='MsoNormal'><span>VICERRECTORÍA DE INVESTIGACIÓN Y ESTUDIOS AVANZADOS</span></div>
<p class=MsoNormal align=center style='text-align:center;'><b style='mso-bidi-font-weight:
normal'>PRESUPUESTO <?php echo $postulacion->getConcurso()->getConvocatoria()->getAnio()?><o:p></o:p></b></p>

<div align=center>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 
 style='width:100%;margin-left:2.75pt;border-collapse:collapse;mso-yfti-tbllook:
 1184;mso-padding-alt:0cm 3.5pt 0cm 3.5pt'>
 
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:15.75pt'>
  <td width=253 style='width:190.0pt;border:solid windowtext 1.0pt;background:
  #4F81BD;padding:0cm 3.5pt 0cm 3.5pt;height:15.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='mso-fareast-font-family:
  "Times New Roman";mso-bidi-font-family:Calibri;color:white;mso-fareast-language:
  ES-CL'>ITEM<o:p></o:p></span></b></p>
  </td>
  <td width=223 style='width:167.0pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid white .5pt;background:#4F81BD;padding:0cm 3.5pt 0cm 3.5pt;
  height:15.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='mso-fareast-font-family:
  "Times New Roman";mso-bidi-font-family:Calibri;color:white;mso-fareast-language:
  ES-CL'>MONTO<o:p></o:p></span></b></p>
  </td>
 </tr>
 <?php $i=0;$suma_total = 0;?>
 <?php foreach($postulacion->getEvaluacionFinal()->getAjustesRecurso() as $ajuste_recurso):?>
   <tr style='mso-yfti-irow:1;height:15.75pt'>
    <td width=253 style='width:190.0pt;border:solid windowtext 1.0pt;border-top:
    none;mso-border-top-alt:solid white .5pt;background:<?php echo ($i%2 == 0) ? '#B8CCE4' : '#DCE6F1'?>;padding:0cm 3.5pt 0cm 3.5pt;
    height:15.75pt'>
    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:normal'><span style='mso-fareast-font-family:"Times New Roman";
    mso-bidi-font-family:Calibri;color:black;mso-fareast-language:ES-CL'><?php echo $ajuste_recurso->getRecurso()->getItemConcurso()->getItem()->getNombreItem()?><o:p></o:p></span></p>
    </td>
    <td width=223 valign=bottom style='width:167.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid white .5pt;mso-border-left-alt:solid white .5pt;
    background:<?php echo ($i%2 == 0) ? '#B8CCE4' : '#DCE6F1'?>;padding:0cm 3.5pt 0cm 3.5pt;height:15.75pt'>
    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right;line-height:normal'><span style='mso-fareast-font-family:
    "Times New Roman";mso-bidi-font-family:Calibri;color:black;mso-fareast-language:
    ES-CL'>$<?php echo number_format($ajuste_recurso->getMontoAprobado(),0,'','.')?><o:p></o:p></span></p>
    </td>
  </tr>
  <?php $i++?>
  <?php $suma_total = $suma_total + $ajuste_recurso->getMontoAprobado()?>
 <?php endforeach?>
 
 
 <tr style='mso-yfti-irow:6;mso-yfti-lastrow:yes;height:15.75pt'>
  <td width=253 style='width:190.0pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid white .5pt;background:#DCE6F1;padding:0cm 3.5pt 0cm 3.5pt;
  height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span style='mso-fareast-font-family:"Times New Roman";
  mso-bidi-font-family:Calibri;color:black;mso-fareast-language:ES-CL'>TOTAL<o:p></o:p></span></b></p>
  </td>
  <td width=223 valign=bottom style='width:167.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid white .5pt;mso-border-left-alt:solid white .5pt;
  background:#DCE6F1;padding:0cm 3.5pt 0cm 3.5pt;height:15.75pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  style='mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:Calibri;
  color:black;mso-fareast-language:ES-CL'>$<?php echo number_format($suma_total,0,'','.')?><o:p></o:p></span></b></p>
  </td>
 </tr>
</table>

</div>

<img id="logo_pucv" src="/home/sfprojects/postulacion_interna_di/web/images/logo_pucv_ 85_chico.jpg" width="150" height="83"></img>
<img id="di_vertical" src="/home/sfprojects/postulacion_interna_di/web/images/DI_vertical.PNG" width="70"></img>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal'><o:p>&nbsp;</o:p></p>
<?php if($postulacion->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'):?>
<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'>El presente documento
se firma en dos ejemplares, uno para la Unidad Académica y otro para la Dirección de Investigación.</p>
<?php else:?>
<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'>El presente documento
se firma en dos ejemplares, uno para <?php if($postulacion->getPersona()->getSexo() == 'M'):?>el Investigador<?php else:?>la Investigadora<?php endif;?> Responsable y otro para la Dirección de Investigación.</p>
<?php endif;?>
<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
justify;line-height:normal;tab-stops:163.75pt 253.75pt'><o:p>&nbsp;</o:p></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 align=left
 width=610 style='width:457.35pt;border-collapse:collapse;mso-table-overlap:
 never;mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;
 margin-right:4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
 margin;mso-table-left:left;mso-table-top:.05pt;mso-padding-alt:0cm 3.5pt 0cm 3.5pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes' valign='top'>
  
  <?php if($postulacion->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'):?>
    
      <td  style='padding:0cm 3.5pt 0cm 3.5pt'>
      <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
      margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
      line-height:normal;tab-stops:163.75pt center 222.3pt left 253.75pt 326.5pt;
      mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:around;
      mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
      mso-element-top:.05pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
      normal'><span style='text-transform: capitalize;mso-fareast-font-family:"Times New Roman";color:black;
      mso-fareast-language:ES-CL'><?php echo $postulacion->getTesista()->getNombre()?> <?php echo $postulacion->getTesista()->getApellido1()?> <?php echo substr($postulacion->getTesista()->getApellido2(),0,1)?>.<o:p></o:p></span></b></p>
      <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
      margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
      line-height:normal;tab-stops:163.75pt center 222.3pt left 253.75pt 326.5pt;
      mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:around;
      mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
      mso-element-top:.05pt;mso-height-rule:exactly'><span style='mso-fareast-font-family:
      "Times New Roman";color:black;mso-fareast-language:ES-CL'><?php if($postulacion->getTesista()->getSexo() == 'M'):?>Alumno Tesista<?php else:?>Alumna Tesista<?php endif;?><o:p></o:p></span></p>
      </td>
      <td  style='padding:0cm 3.5pt 0cm 3.5pt'>
      <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
      margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
      line-height:normal;tab-stops:163.75pt center 222.3pt left 253.75pt 326.5pt;
      mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:around;
      mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
      mso-element-top:.05pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
      normal'><span style='text-transform: capitalize;mso-fareast-font-family:"Times New Roman";color:black;
      mso-fareast-language:ES-CL'><?php echo $postulacion->getPersona()->getNombre()?> <?php echo $postulacion->getPersona()->getApellido1()?> <?php echo substr($postulacion->getPersona()->getApellido2(),0,1)?>.<o:p></o:p></span></b></p>
      <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
      margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
      line-height:normal;tab-stops:163.75pt center 222.3pt left 253.75pt 326.5pt;
      mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:around;
      mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
      mso-element-top:.05pt;mso-height-rule:exactly'><span style='mso-fareast-font-family:
      "Times New Roman";color:black;mso-fareast-language:ES-CL'><?php if($postulacion->getPersona()->getSexo() == 'M'):?>Profesor Guía de Tesis<?php else:?>Profesora Guía de Tesis<?php endif;?><o:p></o:p></span></p>
      </td>
      <td  style='padding:0cm 3.5pt 0cm 3.5pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
      text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
      7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
      mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
      exactly'><b style='mso-bidi-font-weight:normal'>Paula A. Rojas S.<o:p></o:p></b></p>
      <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
      text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
      7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
      mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
      exactly'>Directora de Investigación</p>
      <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
      text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
      7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
      mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
      exactly'>Pontificia Universidad Católica de Valparaíso</p>
      <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
      text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
      7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
      mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
      exactly'><span style='mso-fareast-font-family:"Times New Roman";color:black;
      mso-fareast-language:ES-CL'><o:p>&nbsp;</o:p></span></p>
      </td>
  <?php else:?>
  <td width=279 style='width:209.3pt;padding:0cm 3.5pt 0cm 3.5pt'>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal;tab-stops:163.75pt center 222.3pt left 253.75pt 326.5pt;
  mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:around;
  mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
  mso-element-top:.05pt;mso-height-rule:exactly'><b style='mso-bidi-font-weight:
  normal'><span style='text-transform: capitalize;mso-fareast-font-family:"Times New Roman";color:black;
  mso-fareast-language:ES-CL'><?php echo $postulacion->getPersona()->getNombre()?> <?php echo $postulacion->getPersona()->getApellido1()?> <?php echo substr($postulacion->getPersona()->getApellido2(),0,1)?>.<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:2.75pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal;tab-stops:163.75pt center 222.3pt left 253.75pt 326.5pt;
  mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:around;
  mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:margin;
  mso-element-top:.05pt;mso-height-rule:exactly'><span style='mso-fareast-font-family:
  "Times New Roman";color:black;mso-fareast-language:ES-CL'><?php if($postulacion->getPersona()->getSexo() == 'M'):?>Investigador Responsable<?php else:?>Investigadora Responsable<?php endif;?><o:p></o:p></span></p>
  </td>
  <td width=331 style='width:248.05pt;padding:0cm 3.5pt 0cm 3.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
  7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
  exactly'><b style='mso-bidi-font-weight:normal'>Paula A. Rojas S.<o:p></o:p></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
  7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
  exactly'>Directora de Investigación</p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
  7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
  exactly'>Pontificia Universidad Católica de Valparaíso</p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal;mso-element:frame;mso-element-frame-hspace:
  7.05pt;mso-element-wrap:around;mso-element-anchor-vertical:paragraph;
  mso-element-anchor-horizontal:margin;mso-element-top:.05pt;mso-height-rule:
  exactly'><span style='mso-fareast-font-family:"Times New Roman";color:black;
  mso-fareast-language:ES-CL'><o:p>&nbsp;</o:p></span></p>
  </td>
  <?php endif;?>
 </tr>
</table>



</div>

</body>

</html>
