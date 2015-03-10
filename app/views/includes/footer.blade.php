<!-- Footer ================================================================== -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        Copyright &copy; {{date('Y')}} | Site Version <strong>2.0</strong>
    </div>
    Developed By <strong><a href="http://www.facebook.com/bondhu" data-toggle="modal">Burhan Uddin </a>[Version 1.0]</strong>,<strong><a href="http://www.facebook.com/bondhu">Yousuf Khan Ratul</a>,<a href="http://www.facebook.com/bondhu">Abu Shahriar Ratul</a>[Version 2.0]</strong>
</footer>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<div class="modal fade" id="developerVersion1" tabindex="-1" role="dialog" aria-labelledby="AboutLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Version 1.0</h4>
            </div>
            <div class="modal-body">
                Burhan Uddin
                </br>
                CSE 2005 Batch
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


{{HTML::script('js/jquery.min.js')}}
{{HTML::script('bootstrap/js/bootstrap.min.js')}}
{{HTML::script('plugins/slimScroll/jquery.slimScroll.min.js')}}
{{HTML::script('plugins/fastclick/fastclick.min.js')}}
{{HTML::script('dist/js/app.min.js')}}
@yield('script')
