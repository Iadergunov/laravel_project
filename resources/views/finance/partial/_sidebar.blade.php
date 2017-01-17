<div class="col-sm-3">
    <div class="list-group">
        <a href="{{ action('Transactions_controller@index') }}" class="list-group-item">
            <span class="glyphicon glyphicon-rub"></span> Transactions
        </a>
        <a href="{{ action('Account_controller@index') }}" class="list-group-item">
            <span class="glyphicon glyphicon-folder-close"></span> Accounts
        </a>
        <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-th-list"></span> Groups
        </a>
        <a href="{{action('Finance_controller@reports')}}" class="list-group-item">
            <span class="glyphicon glyphicon-th-list"></span> Reports
        </a>
    </div>
</div>