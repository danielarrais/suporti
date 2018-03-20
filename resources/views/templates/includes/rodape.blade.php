</main>
<footer class="page-footer grey darken-3">
    <footer class="footer-copyright grey darken-4">
        <div class="container">
            © 2018 Daniel Arrais
            <a class="grey-text text-lighten-4 right" href="#!">Mapa do site</a>
        </div>
    </footer>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{url('js/materialize.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".button-collapse").sideNav();
        Materialize.updateTextFields();
        $('select').material_select();
        $(".dropdown-button").dropdown();
        $('ul.tabs').tabs('select_tab', 'tab_id');
        $('.collapsible').collapsible();
        $('.modal').modal();
    });
</script>
</body>
</html>