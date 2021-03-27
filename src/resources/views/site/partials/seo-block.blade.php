<div class="azcloud-azintelecom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="logos">
                            <img src="{{ asset('assets/site/images/azcloud-logo.svg') }}" alt="Logo azcloud">
                            <a href="https://azintelecom.az" target="_blank">
                                <img src="{{ asset('assets/site/images/azintelecom-logo.svg') }}" alt="Logo azintelecom">
                            </a>
                        </div>
                    </div>
                    <!-- Col-->

                    @if (filled($seo = \App\Plugins\Page\PagePlugin::getByIdentity(['identity' => 'seo-text-footer'])))
                        <div class="col-lg-6">
                            <div class="text">
                                {!! $seo->getContent() !!}
                            </div>
                        </div>
                    @endif
                <!-- Col-->
                </div>
            </div>
            <!-- Col-->
        </div>
    </div>
</div>
<!-- Azcloud / aztelecom (seo)-->