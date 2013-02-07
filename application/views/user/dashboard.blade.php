@layout('templates.main')

@section('content')
<div class="container">
    <div class="span6 first">
        <div class="column-header">
            <div class="span5 first column-top">
                <div class="column-inner">
                    Most Recent Voting Topics
                </div>
            </div>
            <div class="span1 first">
                {{ HTML::image('img/user_dashboard/add_new.jpg', 'Add new voting topic', array('id'=>'new-voting-topic')) }}
            </div>
        </div>
        
        <!-- LOOP START -->
        <div class="topic-large span6 first">
            <div class="column-inner">
                <h3>1. Topic Title</h3>
                <p>
                    Lorem ipsum <a href="#" class="read-more">(Read More)</a>
                </p>
                <p>
                    <em>Total votes: <strong>24</strong></em>
                </p>
                <p>
                    <em>Current Vote: YES <strong>75%</strong> NO <strong>25%</strong></em>
                </p>
            </div>
        </div>
        <div class="topic-small span3 first">
            <div class="column-inner">
                <h3>2. Topic Title</h3>
                <p>
                    Lorem ipsum <a href="#" class="read-more">(Read More)</a>
                </p>
                <p>
                    <em>Total votes: <strong>24</strong></em>
                </p>
                <p>
                    <em>Current Vote: YES <strong>75%</strong> NO <strong>25%</strong></em>
                </p>
            </div>
        </div>
        <div class="topic-small span3 first">
            <div class="column-inner">
                <h3>3. Topic Title</h3>
                <p>
                    Lorem ipsum <a href="#" class="read-more">(Read More)</a>
                </p>
                <p>
                    <em>Total votes: <strong>24</strong></em>
                </p>
                <p>
                    <em>Current Vote: YES <strong>75%</strong> NO <strong>25%</strong></em>
                </p>
            </div>
        </div>
        <!-- LOOP END -->
        <div class="span6 first">
            {{ HTML::link('listall/topics', 'See all voting topics') }}
        </div>
    </div>
    
    <div class="span6">
        <div class="column-header">
            <div class="span5 first column-top">
                <div style="padding-left:20px;">
                    Most Recent Discussion Topics
                </div>
            </div>
            <div class="span1 first">
                {{ HTML::image('img/user_dashboard/add_new.jpg', 'Add new discussion topic', array('id'=>'new-discussion-topic')) }}
            </div>
        </div>
        
         <!-- LOOP START -->
        <div class="topic-large span6 first">
            <div class="column-inner">
                <h3>1. Topic Title</h3>
                <p>
                    Lorem ipsum <a href="#" class="read-more">(Read More)</a>
                </p>
                <p>
                    <em>Total votes: <strong>24</strong></em>
                </p>
                <p>
                    <em>Current Vote: YES <strong>75%</strong> NO <strong>25%</strong></em>
                </p>
            </div>
        </div>
        <div class="topic-small span3 first">
            <div class="column-inner">
                <h3>2. Topic Title</h3>
                <p>
                    Lorem ipsum <a href="#" class="read-more">(Read More)</a>
                </p>
                <p>
                    <em>Total votes: <strong>24</strong></em>
                </p>
                <p>
                    <em>Current Vote: YES <strong>75%</strong> NO <strong>25%</strong></em>
                </p>
            </div>
        </div>
        <div class="topic-small span3 first">
            <div class="column-inner">
                <h3>3. Topic Title</h3>
                <p>
                    Lorem ipsum <a href="#" class="read-more">(Read More)</a>
                </p>
                <p>
                    <em>Total votes: <strong>24</strong></em>
                </p>
                <p>
                    <em>Current Vote: YES <strong>75%</strong> NO <strong>25%</strong></em>
                </p>
            </div>
        </div>
        <!-- LOOP END -->
        <div class="span6 first">
            {{ HTML::link('listall/discussions', 'See all discussion topics') }}
        </div>
    </div>
</div>
@endsection
