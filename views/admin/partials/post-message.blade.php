@php
    $errorMessage = "";
    if ($errorType == "newPost") {
        switch ($errorCode) {
            case 1:
                $errorMessage = "Post Created Successfully";
                break;
            case 2:
                $errorMessage = "Something goes wrong";
                break;
        }
    } elseif ($errorType == "deletePost") {
        switch ($errorCode) {
            case 1:
                $errorMessage = "Post Deleted Successfully";
                break;
            case 2:
                $errorMessage = "Something goes wrong";
                break;
        }
    } elseif ($errorType == "updatePost") {
        switch ($errorCode) {
            case 1:
                $errorMessage = "Post Updated Successfully";
                break;
            case 2:
                $errorMessage = "Something goes wrong";
                break;
        }
    }
@endphp
<div class="pt-3 pb-3 text-center text-white bg-{{ $errorCode == 1 ? 'success' : 'danger' }} w-100 h-auto">
    <b>{{ $errorMessage }}</b>
</div>

