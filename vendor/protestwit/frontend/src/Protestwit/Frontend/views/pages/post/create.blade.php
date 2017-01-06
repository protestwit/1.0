@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')

    <component is={{ $vue->getViewName() }} inline-template>

        {{Form::open(['route' => 'api.post.store', 'class' => 'form-horizontal'])}}

        <hr>

            <fieldset>
                    <label for="title">Title</label>
                    <input type="text" v-model="model.title" id="postTitle" class="form-control" name="title">
                    <label for="content">Content</label>
                    <textarea v-model="model.content" id="postText" class="form-control" name="content"></textarea>
                    <div class="controls">
                        <a >content policy</a>
                        <a >formatting help</a>
                    </div>
                        <label for="group">choose a group</label>
                        <input @keyUp="searchGroups(model.group.label)" type="text" v-model="model.group.label" id="postGroup" class="form-control" name="group">
                        <div v-if="groupSearchOptions.length" class="input-search-dropdown">
                            <a @click="chooseGroupFromSearch(option)" v-for="option in groupSearchOptions">
                                @{{ option.name }}
                            </a>
                        </div>
                        <label for="group">choose an event</label>
                        <input @keyUp="searchEvents(model.event.label)"  type="text" v-model="model.event.label" id="postEvent" class="form-control" name="event">
                        <div v-if="eventSearchOptions.length" class="input-search-dropdown">
                            <a @click="chooseEventFromSearch(option)" v-for="option in eventSearchOptions">
                                @{{ option.name }}
                            </a>
                        </div>
                    <div class="controls">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pick Section Type <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li v-for="type in sectionTypes" >
                                    <a @click="chooseSectionType(type)">@{{ type.label }}</a>
                                </li>
                            </ul>
                        </li>
                        <div @click="addSection()" class="btn bdn-success"  class="btn btn-success">Add Section</div>
                    <div @click="savePost()" class="btn bdn-success"  class="btn btn-success">Save</div>
            </fieldset>
        {{Form::close()}}
        <pre>@{{ $data | json }}</pre>
    </component>
@stop