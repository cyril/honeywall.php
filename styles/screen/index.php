<?php
header('Content-type: text/css; charset=utf-8');
?>

@charset "UTF-8";

@import url(inc.header.css);
@import url(inc.tabs.css);
@import url(inc.path.css);
@import url(inc.content.css);
@import url(inc.option.css);
@import url(inc.footer.css);

body {
margin: 0px;
background: #fff; }
ol, ul, p, body, tr, td, th, form {
font-family: Lucida Grande, verdana, arial, helvetica, sans-serif;
font-size: 13px;
color: #333; }
hr { margin: 2px 0px 2px 0px; }
h1 { font-size: x-large; font-family: Lucida Grande,verdana,arial,helvetica,sans-serif; }
h2 { font-size: large; font-family: Lucida Grande,verdana,arial,helvetica,sans-serif; }
h3 { font-size: medium; font-family: Lucida Grande,verdana,arial,helvetica,sans-serif; }
h4 { font-size: small; font-family: Lucida Grande,verdana,arial,helvetica,sans-serif; }
h5 { font-size: x-small; font-family: Lucida Grande,verdana,arial,helvetica,sans-serif; }
h6 { font-size: xx-small; font-family: Lucida Grande,verdana,arial,helvetica,sans-serif; }
pre, tt { font-family: courier,sans-serif }
a {
color: #cc3333;
text-decoration: none; }
a img {
border: 0px; }
table em {
font-style: normal;
font-weight: bold;
color: #666;
margin-left: 0px; }
hr { /* unfortunately hrs are hardcoded */
height: 2px;
color: #e6e6e6;
background: #e6e6e6;
border: 0px; }
td hr {
margin-top: 0.5em;
margin-bottom: 0.5em; }


.titlebar {
background: #FFFFCC;
padding: 4px;
font-size: 14px;
font-weight: bold;
border-bottom: 1px #fab444 solid; }
.files-header td {
background: #ffc;
border: 1px #fab444 solid; }
.files-header td * {
background: none;
border: 0px; }
.files-header + tr td {
background: #ddd; }
.files-header + tr td * {
background: none;
border: 0px;
color: #666; }
.package td {
background: #ffc; }


dl dt:after {
content: ': ';
}
table td, table th {
vertical-align: top;
}
a {
color: #c63;
}
a:active {
color: #f33;
}
a:visited {
color: #936;
}
a:hover {
color: #000;
}
label {
display: block;
cursor: pointer;
}
input, select, textarea {
border: 1px solid #ccc;
}
input[type="text"], input[type="password"], textarea {
width: 120px;
font-size: 12px;
font-family: Geneva, Arial, Helvetica, sans-serif;
color: #660;
padding: 1px 3px;
background-color: #fff;
}
input[type="text"]:focus, input[type="password"]:focus, textarea:focus, select:focus {
border: 1px solid #000;
}
input[type="submit"], input[type="reset"]:hover, input[type="button"] {
color: #000;
text-decoration: none;
padding: 1px 5px;
background-color: #ccc;
background-image: url(../../images/corner.png);
background-position: bottom right;
background-repeat: no-repeat;
border: 1px solid #666;
}
input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover {
background-color: #fff;
background-image: none;
border: 1px solid #000;
}
input[readonly="readonly"], textarea[readonly="readonly"] {
/* color: #660; */
background-color: transparent;
border: 1px solid transparent;
}
input[readonly="readonly"]:focus, textarea[readonly="readonly"]:focus {
border: 1px solid transparent;
}
input[disabled="disabled"] {
background-color: transparent;
border: 1px solid transparent;
}
input[disabled="disabled"]:focus {
border: 1px solid transparent;
}
a img {
border: 0;
}
.done {
color: #060;
/*background-color: #bfb;
border-bottom: 1px solid #6c6;
border-left: 1px solid #6c6;*/
}
.error {
color: #600;
/*background-color: #fbb;
border-bottom: 1px solid #c66;
border-left: 1px solid #c66;*/
}
.done, .error {
font-weight: bold;
}