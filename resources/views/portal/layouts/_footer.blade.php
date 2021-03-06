<footer class="footer">
    <div class="container">
        <p class="float-left">
            由 <a href="{{ site_setting('founder_website') }}" target="_blank">{{ site_setting('founder_nickname') }}</a> 设计和编码 <span style="color: #e27575;font-size: 14px;">❤</span>
            <span class="mx-2">|</span>
            <span class="ml-2">备案号：<a href="http://beian.miit.gov.cn/" target="_blank">{{ site_setting('record_n_varchar', 'xxxxxxxxx') }}</a></span>
        </p>
        <p class="float-right">
            {{-- rss 订阅 --}}
            <a href="{{ url('rss') }}" data-toggle="tooltip" title="RSS feed">
              <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
              </span>
            </a>

            <a href="mailto:{{ site_setting('contact_email') }}">联系我们</a>
        </p>
    </div>
</footer>
