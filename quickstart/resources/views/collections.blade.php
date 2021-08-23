@extends('defaults.app')

@section('content')
    <div class="row justify-content-center">
        <table class="table col col-md-10">
            <thead>
                <tr>
                    <th scope="col">{{ __('Id') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collections as $collection)
                    <tr>
                        <th scope="row" class="col col-1">{{ $collection->id }}</th>
                        <td class="col col-6">
                            <a href={{ 'collections/'.$collection->id }} id={{ 'nameLabel'.$collection->id }}>{{ $collection->name }}</a>
                        </td>
                        <td class="col col-5">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-warning" id={{"clctnEditBtn".$collection->id}} data-toggle="modal" data-target="#editClctnModal">{{ __('Edit') }}</button>
                                <button class="btn btn-danger" id={{"clctnDelBtn".$collection->id}} data-toggle="modal" data-target="#deleteClctnModal">{{ __('Delete') }}</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        <button class="btn btn-primary" id="clctnAddBtn" data-toggle="modal" data-target="#addClctnModal">{{ __('New Collection') }} </button>
    </div>
    <div class="modal fade" id="addClctnModal" tabindex="-1" role="dialog" aria-labelledby="addClctnModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClctnModalLabel">
                        {{ __('New Collection') }}
                    </h5>
                </div>
                <div class="modal-body">
                    <form id="clctnAddForm" action={{ route('collections.store') }} method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="addClctnName" class="col-form-label col-sm-3">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="addClctnName" name="name" class="form-control" required>
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
    <div class="modal fade" id="editClctnModal" tabindex="-1" role="dialog" aria-labelledby="editClctnModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClctnModalLabel">
                        {{ __('Edit Collection') . ": " }}
                    </h5>
                </div>
                <div class="modal-body">
                    <form id="clctnEditForm" action={{ route('collections.index').'/' }} method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="clctnName" class="col-form-label col-sm-3">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="editClctnName" name="name" class="form-control" required>
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
    <div class="modal fade" id="deleteClctnModal" tabindex="-1" role="dialog" aria-labelledby="deleteClctnModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteClctnModalLabel">
                        {{ __('Delete Collection') . ": " }}
                    </h5>
                </div>
                <div class="modal-body">
                    <form id="clctnDeleteForm" action={{ route('collections.index').'/' }} method="post">
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
