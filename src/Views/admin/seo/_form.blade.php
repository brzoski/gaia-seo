<!-- Panel start -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">SEO Tags</h3>
	</div>
	<div class="panel-body">


        <div role="tabpanel" class="tab-wrapper">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#metatags" aria-controls="metatags" role="tab" data-toggle="tab">
                        <i class="fa fa-code"></i>
                        Meta Tags
                    </a>
                </li>
                <li role="presentation">
                    <a href="#facebook" aria-controls="facebook" role="tab" data-toggle="tab">
                        <i class="fa fa-facebook-square"></i>
                        Facebook Sharing
                    </a>
                </li>
                <li role="presentation">
                    <a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab">
                        <i class="fa fa-twitter"></i>
                        Twitter Sharing
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- meta tags -->
                <div role="tabpanel" class="tab-pane active" id="metatags">
                   <div class="form-group">
                        {!! Form::label('meta_title', 'Meta Title', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('meta_title', $seo->meta_title, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('meta_description', $seo->meta_description, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('meta_keywords', $seo->meta_keywords, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <!-- facebook -->
                <div role="tabpanel" class="tab-pane" id="facebook">
                    <div class="form-group">
                        {!! Form::label('facebook_title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('facebook_title', $seo->facebook_title, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('facebook_description', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('facebook_description', $seo->facebook_description, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                    </div>
                </div>

                <!-- twitter -->
                <div role="tabpanel" class="tab-pane" id="twitter">
                   <div class="form-group">
                        {!! Form::label('twitter_title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('twitter_title', $seo->twitter_title, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('twitter_description', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('twitter_description', $seo->twitter_description, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
 
	</div>
</div>
<!-- Panel end -->