<!-- Scripts -->
<script src="{{ asset('assets/remark/global/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/popper-js/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/select2/select2.full.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ asset('assets/remark/global/vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/Component.js')  }}"></script>
<script src="{{ asset('assets/remark/global/js/Plugin.js')  }}"></script>
<script src="{{ asset('assets/remark/global/js/Base.js')  }}"></script>
<script src="{{ asset('assets/remark/global/js/Config.js')  }}"></script>
<script src="{{ asset('assets/remark/global/js/material.js')  }}"></script>
<script src="{{ asset('assets/remark/assets/js/Section/Menubar.js')  }}"></script>
<script src="{{ asset('assets/remark/assets/js/Section/GridMenu.js')  }}"></script>
<script src="{{ asset('assets/remark/assets/js/Section/Sidebar.js')  }}"></script>
<script src="{{ asset('assets/remark/assets/js/Section/PageAside.js')  }}"></script>
<script src="{{ asset('assets/remark/assets/js/menu.js') }}"></script>
<script src="{{ asset('assets/remark/assets/js/Site.js') }}"></script>
<script src="{{ asset('assets/remark/global/js/Plugin/switchery.js') }}"></script>
<script src="{{ asset('assets/remark/js/custom.js') }}"></script>

<script>
    $(document).ready(function($) {
        'use strict';
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var Site = window.Site;
        $(document).ready(function(){
            Site.run();
        });
    });
</script>
