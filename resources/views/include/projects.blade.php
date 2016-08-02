<div class="table-responsive pbtn">
    <table class="table table-default">
        <tr>
            <th>Логотип</th>
            <th>Название проекта</th>
            <th>Варианты формулировок</th>
        </tr>

        @foreach ($projects as $k => $project)
            {{ $tags = '' }}
            @foreach ($project->tags as $tag)
                {{ $tags[] = $tag->name }}
            @endforeach
            <tr data-tags='{{ json_encode($tags, JSON_UNESCAPED_UNICODE) }}'>
            <td>
                @if ($project->logo)
                    <img border="0"
                         src="{{ $project->logo }}">
                @endif
            </td>
            <td>{{ $project->description }}</td>
            <td><a class="dashed" data-toggle="collapse" href="#collapse{{$k+1}}"
                   aria-expanded="false" aria-controls="collapse">{{ $project->references[0]->name }}</a></td>
            </tr>
            <tr class="collapse" id="collapse{{$k+1}}">
                <td colspan="5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="btn-toolbar padding-bottom-15">
                                <div class="btn-group pull-right">
                                    <a href="#" class="btn btn-default btn-xs"><span
                                                data-toggle="tooltip" data-placement="top"
                                                title="Добавить описание"
                                                class="glyphicon glyphicon glyphicon-pushpin"
                                                aria-hidden="true"></span></a>
                                    <a href="#" class="btn btn-default btn-xs"><span
                                                data-toggle="tooltip" data-placement="top"
                                                title="Редактировать проект"
                                                class="glyphicon glyphicon glyphicon-wrench"
                                                aria-hidden="true"></span></a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-default table-hover">
                                    <tr class="hidden pattern">
                                        <th>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-link btn-sm js-references-edit" aria-label="Edit reference">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-link btn-sm js-references-remove" aria-label="Delete reference">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <span class="js-references-change editable editable-click" data-emptytext="" data-id="{{ $project->id }}"></span>
                                        </th>
                                    </tr>
                                    @foreach ($project->references as $i => $reference)
                                        <tr>
                                            <th>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-link btn-sm js-references-edit"
                                                            aria-label="Edit reference">
                                                                        <span class="glyphicon glyphicon-edit"
                                                                              aria-hidden="true"></span>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-link btn-sm js-references-remove"
                                                            aria-label="Delete reference">
                                                                        <span class="glyphicon glyphicon-remove"
                                                                              aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <span class="js-references-change" data-id="{{ $project->id }}">{{ $reference->name }}</span>
                                            </th>
                                        </tr>
                                    @endforeach
                                    <tr class="action">
                                        <td>
                                            <button type="button"
                                                    data-id="{{ $project->id }}"
                                                    class="btn btn-link btn-sm js-references-create"
                                                    aria-label="Add reference">
                                                                    <span class="glyphicon glyphicon-plus"
                                                                          aria-hidden="true"></span>
                                            </button>
                                            <i><a href="javascript:void(0)" class="js-references-create" data-id="{{ $project->id }}">Добавить референцию</a></i></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
</div>