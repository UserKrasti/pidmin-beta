var temp, cpu, free, tempc, cpuint, freemb, uptime;

$.ajaxSetup({cache: false});

function getJSON(){
    $.ajax({
        url: "http://" + location.hostname + '/core/exec.php',      
        success: function(data) {
            json = JSON.parse(data);

            temp = json.temp;

            cpu = json.cpu;
            cpuint = cpu.substring(0, cpu.length - 1);
            
            free = json.freeMem; 
            freemb = free + ' MB';

            uptime = json.upTime;
        }
    });     
};

function setTemp() {
    getJSON();
    if(temp != null && temp !== undefined){
        $('#temp').html(temp);
    } else {
        $('#temp').html('...');
    }
    if(temp > 48 && temp < 60) {
    	$('#caption_div_temp').removeClass('gre1');
    	$('#caption_div_temp').removeClass('red1');
    	$('#caption_div_temp').addClass('yel1');

    	$('#value_div_temp').removeClass('gre2');
    	$('#value_div_temp').removeClass('red2');
    	$('#value_div_temp').addClass('yel2');
    }

    if(temp > 60) {
    	$('#caption_div_temp').removeClass('gre1');
    	$('#caption_div_temp').addClass('red1');
    	$('#caption_div_temp').removeClass('yel1');

    	$('#value_div_temp').removeClass('gre2');
    	$('#value_div_temp').addClass('red2');
    	$('#value_div_temp').removeClass('yel2');
    }

    if(temp < 48) {
    	$('#caption_div_temp').addClass('gre1');
    	$('#caption_div_temp').removeClass('red1');
    	$('#caption_div_temp').removeClass('yel1');

    	$('#value_div_temp').addClass('gre2');
    	$('#value_div_temp').removeClass('red2');
    	$('#value_div_temp').removeClass('yel2');
    }
}

function setCPULoad() {
    if(cpu != null && cpu !== undefined){
        $('#cpu_load').html(cpu);
    } else {
        $('#cpu_load').html('...');
    }
    if(cpuint > 50 && cpuint < 80) {
    	$('#caption_div_cpu').removeClass('gre1');
    	$('#caption_div_cpu').removeClass('red1');
    	$('#caption_div_cpu').addClass('yel1');

    	$('#value_div_cpu').removeClass('gre2');
    	$('#value_div_cpu').removeClass('red2');
    	$('#value_div_cpu').addClass('yel2');
    }

    if(cpuint > 80) {
    	$('#caption_div_cpu').removeClass('gre1');
    	$('#caption_div_cpu').addClass('red1');
    	$('#caption_div_cpu').removeClass('yel1');

    	$('#value_div_cpu').removeClass('gre2');
    	$('#value_div_cpu').addClass('red2');
    	$('#value_div_cpu').removeClass('yel2');
    }

    if(cpuint < 51) {
    	$('#caption_div_cpu').addClass('gre1');
    	$('#caption_div_cpu').removeClass('red1');
    	$('#caption_div_cpu').removeClass('yel1');

    	$('#value_div_cpu').addClass('gre2');
    	$('#value_div_cpu').removeClass('red2');
    	$('#value_div_cpu').removeClass('yel2');
    }
};

function setFreeMem() {
    if(free != null && free !== undefined && freemb != 'undefined MB'){
        $('#freemem').html(freemb);
    } else {
        $('#freemem').html('...');  
    }
    element = '#value_div_freemem';
    elementC = '#caption_div_freemem';
    if(free > 500 && free < 850) {
    	$(elementC).removeClass('gre1 red1');
    	$(elementC).addClass('yel1');
    	$(element).removeClass('gre2 red2');
    	$(element).addClass('yel2');
    }

    if(free > 850) {
    	$(elementC).removeClass('gre1 yel1');
    	$(elementC).addClass('red1');
    	$(element).removeClass('gre2 yel2');
    	$(element).addClass('red2');
    }

    if(free < 500) {
    	$(elementC).addClass('gre1');
    	$(elementC).removeClass('red1 yel1');
    	$(element).addClass('gre2');
    	$(element).removeClass('red2 yel2');
    }
};

function setUpTime() {
    if(uptime !== undefined){
        $('#uptime').html(uptime);
    } else {
        $('#uptime').html('...');  
    }
};

function rebootDevice(){
    $.ajax({
        url: "http://" + location.hostname + "/functions.php?type=reboot",
        cache:false,
    });
    clearInterval(tempin);
    clearInterval(cploadin);
    clearInterval(frmemin);
    return false;
}

function shutdownDevice(){
    $.ajax({
        url: "http://" + location.hostname + "/functions.php?type=shutdown",
        cache:false,
    });
    clearInterval(tempin);
    clearInterval(cploadin);
    clearInterval(frmemin);
    return false;
}

function check(){
var http = new XMLHttpRequest();
http.open("GET","/index.php");
http.onreadystatechange = function() {
    if(http.readyState != 4) return;
        if(http.status == 200){
            if($('.modal').css('display') != 'none'){
                $('.modal').css('display', 'none');
            }
        } else {
            if($('.modal').css('display') != 'block'){
                $('.modal').css('display', 'block');
                if($('#text').html != 'Connection broken! Try reconnect...'){
                    $('#text').html('Connection broken! Try reconnect...');
                }
            }
        }
}
http.send(null);
}
setInterval(check, 2000);