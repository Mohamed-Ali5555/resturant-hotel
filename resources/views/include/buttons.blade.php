<div class="btn-group" role="group"

     aria-label="Basic example">


        <a href="{{route($route_pref.'.edit',encrypt($row -> id))}}"
           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>


            <form action="{{route($route_pref.'.destroy',encrypt($row['id']))}}" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
                {{-- <button    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</button> --}}
                <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1  delete-confirm"
                        onclick="delete_confirm($(this),event)"  type="submit"> Delete </button>
            </form>

</div>




