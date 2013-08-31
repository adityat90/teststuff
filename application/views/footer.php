<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.0.3.js"></script>
<script type="text/javascript">
    less = {
        env: "development", // or "production"
        async: false,       // load imports async
        fileAsync: false,   // load imports async when in a page under
                            // a file protocol
        poll: 1000,         // when in watch mode, time in ms between polls
        functions: {},      // user functions, keyed by name
        dumpLineNumbers: "comments", // or "mediaQuery" or "all"
        /*relativeUrls: false,// whether to adjust url's to be relative
                            // if false, url's are already relative to the
                            // entry less file*/
        /*rootpath: ":/a.com/"// a path to add on to the start of every url
                            //resource*/
    };

    function destroyLessCache(pathToCss) { // e.g. '/css/' or '/stylesheets/'

    if (!window.localStorage || !less || less.env !== 'development') {
        return;
    }
    var host = window.location.host;
    var protocol = window.location.protocol;
    var keyPrefix = protocol + '//' + host + pathToCss;

    for (var key in window.localStorage) {
        if (key.indexOf(keyPrefix) === 0) {
          delete window.localStorage[key];
      }
  }
}

destroyLessCache('/less/');
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/less-1.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/respond.js"></script> -->

<script type="text/javascript">
		$(document).ready(function()
		{
			// alert('Lol');
		});
</script>

</body>
</html>