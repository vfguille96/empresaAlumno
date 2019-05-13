function show1(){
    document.getElementById('div1').style.display ='none';
}
function show2(){
    document.getElementById('div1').style.display = 'block';
}

function showEmpresa(){
    document.getElementById('div2').style.display = 'none';
    document.getElementById('div3').style.display = 'block';
}

function showAlumno(){
    document.getElementById('div3').style.display = 'none';
    document.getElementById('div2').style.display = 'block';
}

function hideDiv() {
    document.getElementById('div2').style.display = 'none';
}