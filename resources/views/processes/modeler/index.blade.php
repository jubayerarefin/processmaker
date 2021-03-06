@extends('layouts.layout')

@section('title')
  {{__('Edit Process')}}
@endsection

@section('sidebar')
    @include('layouts.sidebar', ['sidebar'=> Menu::get('sidebar_processes')])
@endsection


@section('breadcrumbs')
    @include('shared.breadcrumbs', [
    'routes' => [
        __('Designer') => route('processes.index'),
        __('Processes') => route('processes.index'),
        __('Modeler') => null,
        $process->name => null,
      ],
      'showModelerSaveButton' => true
    ])
@endsection

@section('content')
    <div id="modeler-app">
    </div>
@endsection

@section('css')
<style>
div.main {
  position: relative;
}

#modeler-app {
  position: relative;
  width: 100%;
  max-width: 100%;
  height: 100%;
  max-height: 100%;
}

ol.breadcrumb {
  margin-bottom: 0;
  border-bottom: 0;
}

[aria-label="breadcrumb"] {
  position: relative;
}

.modeler-save-button {
  right: 1rem;
  transform: translateY(-50%);
  top: 50%;
}
</style>
@endsection

@section('js')
  <script src="{{mix('js/leave-warning.js')}}"></script>
  <script>
  window.ProcessMaker.modeler = {
    process: @json($process),
    xml: @json($process->bpmn)
  }
  window.ProcessMaker.EventBus.$on('modeler-start', ({ loadXML }) => {
    loadXML(window.ProcessMaker.modeler.xml);
  });
  </script>
    @foreach($manager->getScripts() as $script)
      <script src="{{$script}}"></script>
    @endforeach
  <script src="{{ mix('js/processes/modeler/index.js') }}"></script>
@endsection
