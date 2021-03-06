@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new task</h2>
        <div class="lead">
            Add new task.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ old('title') }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ old('description') }}" 
                        type="text" 
                        class="form-control" 
                        name="description" 
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" 
                        name="body" 
                        placeholder="Body" required>{{ old('body') }}</textarea>

                    @if ($errors->has('body'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="user" class="form-label">Member name</label>
                    <select class="form-control" 
                        name="user_id" required>
                        <option value="">Select Member</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ ($user->name) 
                                    ? 'selected'
                                    : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    {{-- @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif--}}
                </div> 

                <button type="submit" class="btn btn-primary">Save task</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection