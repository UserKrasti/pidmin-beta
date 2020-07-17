<link rel="stylesheet" type="text/css" href="/core/fa/css/all.min.css">  
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-body"> 
      <i class="fa fa-asterisk fa-spin fa-3x fa-fw"></i>
    </div>
    <div class="modal-footer">
      <h3 id="text"></h3>
    </div>
  </div>
</div>

<style>
* {font-family: 'Segoe UI';}

#text {
  margin-top: 55px;
}

.fa {
  margin-top: 50px;
}

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    text-align: center;
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: hidden;
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
    position: relative;
    background-color: #eee;
    margin: auto;
    padding: 0;
    border: 0;
    width: 200px;
    height: 200px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}


.close {
    color: black;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-body {
  text-align: center;
  vertical-align: middle;
  padding: 2px 16px;
}

.modal-footer {
    padding: 2px 16px;
    background-color: #eee;
    color: black;
}
</style>