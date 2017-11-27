
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 2017/8/30
 * Time: 下午12:44
 */

<div >
    <div>{{$title}}</div>
    {{$slot}}

</div>
@component('alert')
    @slot('title')
    @endslot
    <strong>something goes wrong!</strong>
@endcomponent