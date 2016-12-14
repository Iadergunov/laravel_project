    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="form-horizontal" for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-horizontal" for="body">Text:</label>
        <textarea name="body" id="body" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="{{ $Name_button}}" id="{{ $Name_button}}" class="btn btn-primary form-control" value="{{ $Submit_button_text}}">
    </div>