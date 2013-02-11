@layout('templates.main')

@section('content')
<div class="container">
    <div class="span12 first" id="overview-clouds">
        {{ Session::get('community')->community_name }}
    </div>
    
    <div class="span4 first">
        <div class="column-header column-top">
            <div class="column-inner">
                Information
            </div>
        </div>
        
        <div class="topic-large span6 first">
            <div class="column-inner">
                asdf
            </div>
        </div>
    </div>
    
    <div class="span4">
        <div class="column-header column-top">
            <div class="column-inner">
                Most Popular Topics
            </div>
        </div>
    </div>
    
    <div class="span4">
        <div class="column-header column-top">
            <div class="column-inner">
                Member List
            </div>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>
@endsection
