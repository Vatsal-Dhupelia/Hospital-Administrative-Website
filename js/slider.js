function f1(){
    var slider = document.querySelector('#slider');
    slider.style.marginLeft='-100%';
    function f2(){
        var slider = document.querySelector('#slider');
        slider.style.marginLeft='-200%';
        function f3(){
            var slider = document.querySelector('#slider');
            slider.style.marginLeft='-300%';
            function f0(){
                var slider = document.querySelector('#slider');
                slider.style.marginLeft='0';
                setTimeout(f1, 3000);
            }
            setTimeout(f0, 3000);
        }
        setTimeout(f3, 3000);
    }
    setTimeout(f2, 3000);
}
setTimeout(f1, 3000);