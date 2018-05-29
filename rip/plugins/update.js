$(document).ready(function () {
    $('#anima-layer-a2').pan({ fps: 30, speed: 0.7, dir: 'left', depth: 30 });
    $('#anima-layer-b2').pan({ fps: 30, speed: 1.2, dir: 'left', depth: 70 });
    $('.minimal-tabs-service li:eq(0)').addClass('active');
    $('.minimal-core-services .panel-box .panel:eq(0)').addClass('active');
    $('.minimal-services-content .panel:eq(0)').addClass('active');
});