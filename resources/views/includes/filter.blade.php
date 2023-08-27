<div class="col-2 d-flex flex-column mt-3">
    <form action="{{ route('lot.index') }}" method="get" id="filterForm">
        <h3>Filter</h3>


        <h4>Order</h4>
        <div class="form-check">
            <input class="form-check-input" value="desc" type="radio" name="order" id="orderDesk"
                {{ request()->query('order') === 'desc' ? 'checked' : '' }} onclick="submitClick()">
            <label class="form-check-label" for="orderDesk">
                New lots
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="asc" type="radio" name="order" id="orderAsc"
                {{ request()->query('order') === 'asc' ? 'checked' : '' }} onclick="submitClick()">
            <label class="form-check-label" for="orderAsc">
                Old lots
            </label>
        </div>


        <h4>Categories</h4>
        @foreach ($categories as $category)
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" name='categories[]' type="checkbox" 
                        value="{{ $category->id }}" id="{{ $category->title }}" onclick="unCheckOther(); submitClick()"
                        @if (!empty(request()->query('categories')))                    
                            @foreach (request()->query('categories')  as $category_url)
                                {{ $category_url == $category->id ? 'checked' : '' }}
                            @endforeach
                        @endif>
                    <label class="form-check-label" for="{{ $category->title }}">
                        {{ $category->title }}
                    </label>
                </div>
                <span class="filter-count">{{ $category->lots_count }}</span>
            </div>
        @endforeach

        @if ($lots_without_cat_count !== 0)
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" name='categories[]' type="checkbox"
                        value="other" id="Other" onclick= "unCheck(this); submitClick()"
                        @if (!empty(request()->query('categories')))                    
                            @foreach (request()->query('categories')  as $category_url)
                                {{ $category_url === "other" ? 'checked' : '' }}
                            @endforeach
                        @endif>
                    <label class="form-check-label" for="Other">
                        Without category
                    </label>
                </div>
                <span class="filter-count">{{ $lots_without_cat_count}}</span>
            </div>
        @endif
    </form>
</div>