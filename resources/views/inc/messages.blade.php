@if(count($errors) > 0)
    <div class='alert alert-danger'>
        There were errors in the submission of the form. Please review the fields below.
    </div>
@elseif(isset($overtype))
    <div class='alert alert-success'>
        Form successfully submitted! You have created a {{ $overtype }} override request for the course {{ $course_num }} at {{ $campus }} campus.
    </div>
@endif

@if(session('success'))
    <div class='alert alert-success'>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class='alert alert-danger'>
        {{session('error')}}
    </div>
@endif