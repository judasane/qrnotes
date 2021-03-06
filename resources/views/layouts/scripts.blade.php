<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
<script src="{{ asset('/js/materialize.js') }}"></script>
<script src="{{ asset('/js/init.js') }}"></script>
@if(isset($scripts) && count($scripts)>0)
@foreach($scripts as $script)
<script src="{{ asset("/js/$script.js") }}"></script>

@endforeach
@endif

<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-67225909-1', 'auto');
    ga('send', 'pageview');
</script>