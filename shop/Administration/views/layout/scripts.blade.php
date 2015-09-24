<!-- Vendor -->
<script src="/assets/cms/vendor/jquery/jquery.js"></script>
<script src="/assets/cms/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/cms/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/cms/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/cms/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/cms/vendor/magnific-popup/magnific-popup.js"></script>
<script src="/assets/cms/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="/assets/cms/vendor/pnotify/pnotify.custom.js"></script>

<script src="/assets/cms/javascripts/core.js"></script>
<!-- Specific Page Vendor -->

<!-- Theme Base, Components and Settings -->
<script src="/assets/cms/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/cms/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/cms/javascripts/theme.init.js"></script>

@if(isset($scripts) && !empty($scripts))
    @foreach($scripts as $script)
        {!! $script !!}
    @endforeach
@endif