<div class="single_widget search_widget">
    <div id="imaginary_container">
    <form action="{{ route('search') }}" method="GET">
      <div class="input-group stylish-input-group">
        <input
          type="text"
          class="form-control"
          placeholder="Search"
          name="search"
          required
        />
        <span class="input-group-addon">
          <button type="submit">
            <span class="lnr lnr-magnifier"></span>
          </button>
        </span>
      </div>
    </form>
    </div>
  </div>