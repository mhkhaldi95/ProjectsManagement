<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">    <link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="canonical" href="https://mdbootstrap.com/docs/jquery/modals/forms/" />
    <link rel='stylesheet' id='wp-block-library-css'  href='https://mdbootstrap.com/wp-includes/css/dist/block-library/style.min.css?ver=5.2.3' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-block-style-css'  href='https://mdbootstrap.com/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style.css?ver=2.3.0' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css'  href='https://mdbootstrap.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.4' type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required { visibility: visible; }
    </style>
    <link rel='stylesheet' id='wsl-widget-css'  href='https://mdbootstrap.com/wp-content/plugins/wordpress-social-login/assets/css/style.css?ver=5.2.3' type='text/css' media='all' />

    <link rel='stylesheet' id='compiled.css-css'  href='https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.10.min.css?ver=4.8.10' type='text/css' media='all' />
    <script type='text/javascript' src='https://mdbootstrap.com/wp-admin/load-scripts.php?c=gzip&amp;load%5B%5D=jquery-core,jquery-migrate&amp;ver=5.2.3'></script>
    <script type='text/javascript' src='https://mdbootstrap.com/wp-content/plugins/duracelltomi-google-tag-manager/js/gtm4wp-woocommerce-classic.js?ver=1.10.1'></script>
    <script type='text/javascript' src='https://mdbootstrap.com/wp-content/plugins/duracelltomi-google-tag-manager/js/gtm4wp-woocommerce-enhanced.js?ver=1.10.1'></script>
    <script type='text/javascript' src='https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/mdb-search.js?ver=4.7.3'></script>
    <script type='text/javascript' src='https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/tutorial-share-counts.js?ver=4.8.10-update.3'></script>
    <link rel='https://api.w.org/' href='https://mdbootstrap.com/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://mdbootstrap.com/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://mdbootstrap.com/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 5.2.3" />
    <meta name="generator" content="WooCommerce 3.7.0" />
    <link rel='shortlink' href='https://mdbootstrap.com/?p=45930' />
    <link rel="alternate" type="application/json+oembed" href="https://mdbootstrap.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmdbootstrap.com%2Fdocs%2Fjquery%2Fmodals%2Fforms%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://mdbootstrap.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmdbootstrap.com%2Fdocs%2Fjquery%2Fmodals%2Fforms%2F&#038;format=xml" />

    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('login') }}">

    @csrf
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="text"   name="email" id="email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="email">Your email</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" id="defaultForm-pass" name="password" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-default">Login
                </div>
            </div>
        </div>
    </div>
</form>

<a href="" class="mainLink mt-4 ml-5 float-left" data-toggle="modal" data-target="#modalLoginForm">تسجيل دخول</a>

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>