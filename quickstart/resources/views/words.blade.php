@extends('defaults.app')

@section('content')
    <div class="d-flex justify-content-center">
        <table class="table col col-md-10">
            <thead>
                <tr>
                    <th scope="col">{{ __('Id') }}</th>
                    <th scope="col">{{ __('Entry') }}</th>
                    <th scope="col">{{ __('Comment') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($words as $word)
                    <tr>
                        <th scope="row" class="col col-1">{{ $word->id }}</th>
                        <td class="col col-2" id={{ 'entryLabel'.$word->id }}>{{ $word->entry }}</td>
                        <td class="col col-7" id={{ 'cmtLabel'.$word->id }}>{{ $word->comment }}</td>
                        <td class="col col-2">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary" data-toggle="collapse" data-target={{ "#collapse".$word->id }} aria-expanded="false" aria-controls={{ "collapse".$word->id }}>{{ __('Collections') }}</button>
                                <button class="btn btn-warning" id={{"wordEditBtn".$word->id}} data-toggle="modal" data-target="#editWordModal">{{ __('Edit') }}</button>
                                <button class="btn btn-danger" id={{"wordDelBtn".$word->id}} data-toggle="modal" data-target="#deleteWordModal">{{ __('Delete') }}</button>
                            </div>

                        </td>
                    </tr>
                    <tr class="collapse" id={{ "collapse".$word->id }}>
                        <td></td>
                        <td colspan="2">
                            <div>
                                {{ __('Collections') . ": " }}
                                @foreach ($word->collections as $col)
                                    <a class="badge badge-pill badge-primary" href={{ route('collections.show', ['collection' => $col]) }}>{{ $col->name }}</a>
                                @endforeach
                            </div>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addWordModal">{{ __('Add Word') }} </button>
    </div>
    <div class="modal fade" id="addWordModal" tabindex="-1" role="dialog" aria-labelledby="addWordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWordModalLabel">
                        {{ __('New Word') }}
                    </h5>
                </div>
                <div class="modal-body">
                    <form id="wordAddForm" action={{ route('words.store') }} method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="addWordEntry" class="col-form-label col-sm-3">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="addWordEntry" name="entry" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="addWordComment" class="col-form-label col-sm-3">{{ __('Comment') }}</label>
                            <div class="col-sm-9">
                                <textarea id="addWordComment" name="comment" class="form-control" rows="7" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editWordModal" tabindex="-1" role="dialog" aria-labelledby="editWordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWordModalLabel">
                        {{ __('Edit Word') . ": " }}
                    </h5>
                </div>
                <div class="modal-body">
                    <form id="wordEditForm" action={{ route('words.index').'/' }} method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="editWordEntry" class="col-form-label col-sm-3">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="editWordEntry" name="entry" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editWordComment" class="col-form-label col-sm-3">{{ __('Comment') }}</label>
                            <div class="col-sm-9">
                                <textarea id="editWordComment" name="comment" class="form-control" rows="7" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteWordModal" tabindex="-1" role="dialog" aria-labelledby="deleteWordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWordModalLabel">
                        {{ __('Delete Word') . ": " }}
                    </h5>
                </div>
                <div class="modal-body">
                    <form id="wordDeleteForm" action={{ route('words.index').'/' }} method="post">
                        @method('DELETE')
                        @csrf
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-danger mr-1">{{ __('Confirm') }}</button>
                            <button class="btn btn-primary ml-1" data-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
