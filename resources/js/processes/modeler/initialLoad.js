/* eslint-disable func-names */
// Our initial node types to register with our modeler
import {
  association,
  endEvent,
  exclusiveGateway,
  inclusiveGateway,
  parallelGateway,
  sequenceFlow,
  startEvent,
  task,
  scriptTask,
  manualTask,
  pool,
  poolLane,
  textAnnotation,
  messageFlow,
  serviceTask,
  startTimerEvent,
  intermediateTimerEvent,
  callActivity,
  eventBasedGateway,
  intermediateMessageCatchEvent,
  boundaryTimerEvent
} from '@processmaker/modeler';
import bpmnExtension from '@processmaker/processmaker-bpmn-moddle/resources/processmaker.json';
import ModelerScreenSelect from './components/inspector/ScreenSelect';
import UserSelect from './components/inspector/UserSelect';
import GroupSelect from './components/inspector/GroupSelect';
import TaskNotifications from './components/inspector/TaskNotifications';
import ExpressionEditor from './components/inspector/ExpressionEditor';
import TaskAssignment from './components/inspector/TaskAssignment';
import ConfigEditor from './components/inspector/ConfigEditor';
import ScriptSelect from './components/inspector/ScriptSelect';
import StartPermission from './components/inspector/StartPermission';

Vue.component('UserSelect', UserSelect);
Vue.component('GroupSelect', GroupSelect);
Vue.component('ModelerScreenSelect', ModelerScreenSelect);
Vue.component('TaskNotifications', TaskNotifications);
Vue.component('ExpressionEditor', ExpressionEditor);
Vue.component('TaskAssignment', TaskAssignment);
Vue.component('ConfigEditor', ConfigEditor);
Vue.component('ScriptSelect', ScriptSelect);
Vue.component('StartPermission', StartPermission);

let nodeTypes = [
  endEvent,
  task,
  scriptTask,
  manualTask,
  callActivity,
  exclusiveGateway,
  inclusiveGateway,
  parallelGateway,
  sequenceFlow,
  association,
  pool,
  poolLane,
  messageFlow,
  serviceTask,
  textAnnotation,
  eventBasedGateway,
  intermediateMessageCatchEvent,
  boundaryTimerEvent
];

ProcessMaker.nodeTypes.push(startEvent);
ProcessMaker.nodeTypes.push(...nodeTypes);

// Implement user list and group list for intermediate catch event
// eslint-disable-next-line func-names
(function() {
  intermediateMessageCatchEvent.inspectorConfig[0].items[0].items[4] = {
    component: 'UserSelect',
    config: {
      label: 'Allowed User',
      helper: 'Select allowed user',
      name: 'allowedUsers'
    }
  };
  intermediateMessageCatchEvent.inspectorConfig[0].items[0].items[5] = {
    component: 'GroupSelect',
    config: {
      label: 'Allowed Group',
      helper: 'Select allowed group',
      name: 'allowedGroups'
    }
  };
})();

// Set default properties for task
task.definition = function definition(moddle) {
  return moddle.create('bpmn:Task', {
    name: window.ProcessMaker.events.$t('New Task'),
    assignment: 'requester'
  });
};

ProcessMaker.EventBus.$on(
  'modeler-init',
  ({ registerNode, registerBpmnExtension, registerInspectorExtension }) => {
    // Register start events
    registerNode(startEvent);
    registerNode(startTimerEvent, definition => {
      const eventDefinitions = definition.get('eventDefinitions');
      if (
        definition.$type === 'bpmn:StartEvent' &&
        eventDefinitions &&
        eventDefinitions.length &&
        eventDefinitions[0].$type === 'bpmn:TimerEventDefinition'
      ) {
        return startTimerEvent.id;
      }
    });
    registerNode(intermediateTimerEvent, definition => {
      const eventDefinitions = definition.get('eventDefinitions');
      if (
        definition.$type === 'bpmn:IntermediateCatchEvent' &&
        eventDefinitions &&
        eventDefinitions.length &&
        eventDefinitions[0].$type === 'bpmn:TimerEventDefinition'
      ) {
        return intermediateTimerEvent.id;
      }
    });

    /* Register basic node types */
    for (const node of nodeTypes) {
      registerNode(node);
    }

    /* Add a BPMN extension */
    registerBpmnExtension('pm', bpmnExtension);

    /* Register extension for start permission */
    registerInspectorExtension(startEvent, {
      component: 'StartPermission',
      config: {
        label: 'Permission To Start',
        helper: '',
        name: 'startPermission'
      }
    });

    /* Register the inspector extensions for tasks */
    registerInspectorExtension(task, {
      component: 'ModelerScreenSelect',
      config: {
        label: 'Screen For Input',
        helper: 'What Screen Should Be Used For Rendering This Task',
        name: 'screenRef',
        type: 'FORM'
      }
    });
    registerInspectorExtension(task, {
      component: 'TaskAssignment',
      config: {
        label: 'Task Assignment',
        helper: '',
        name: 'taskAssignment'
      }
    });
    registerInspectorExtension(task, {
      component: 'TaskNotifications',
      config: {
        label: 'Task Notifications',
        helper: 'Users that should be notified about task events'
      }
    });

    /* Register the inspector extensions for script tasks */
    registerInspectorExtension(scriptTask, {
      component: 'ScriptSelect',
      config: {
        label: 'Script',
        helper: 'Script that will be executed by the task',
        name: 'scriptRef'
      }
    });

    registerInspectorExtension(scriptTask, {
      component: 'ConfigEditor',
      config: {
        label: 'Script Configuration',
        helper: 'Configuration JSON for the script task',
        name: 'scriptConfiguration',
        property: 'config'
      }
    });
    registerInspectorExtension(endEvent, {
      component: 'ModelerScreenSelect',
      config: {
        label: 'Summary screen',
        helper:
          'Summary screen that will be displayed when process finish with this End event.',
        name: 'screenRef',
        params: { type: 'DISPLAY' }
      }
    });
    registerInspectorExtension(manualTask, {
      component: 'ModelerScreenSelect',
      config: {
        label: 'Summary screen',
        helper:
          'Summary screen that will be displayed when process finish with this End event.',
        name: 'screenRef',
        params: { type: 'DISPLAY' }
      }
    });
    registerInspectorExtension(manualTask, {
      component: 'TaskAssignment',
      config: {
        label: 'Task Assignment',
        helper: '',
        name: 'taskAssignment'
      }
    });
    registerInspectorExtension(manualTask, {
      component: 'TaskNotifications',
      config: {
        label: 'Task Notifications',
        helper: 'Users that should be notified about task events'
      }
    });
  }
);
