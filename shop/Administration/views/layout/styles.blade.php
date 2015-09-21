<!-- Web Fonts  -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="/assets/cms/vendor/bootstrap/css/bootstrap.css" />

<link rel="stylesheet" href="/assets/cms/vendor/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="/assets/cms/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="/assets/cms/vendor/bootstrap-datepicker/css/datepicker3.css" />

<!-- Theme CSS -->
<link rel="stylesheet" href="/assets/cms/stylesheets/theme.css" />

<!-- Skin CSS -->
<link rel="stylesheet" href="/assets/cms/stylesheets/skins/default.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="/assets/cms/stylesheets/theme-custom.css">

@if(isset($styles) && !empty($styles))
    @foreach($styles as $style)
        {!! $style !!}
    @endforeach
@endif
