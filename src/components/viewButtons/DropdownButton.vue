<script setup>
import { ref, usePanel, useApi, computed } from "kirbyuse";

const panel = usePanel();
const api = useApi();
const dropdownContent = ref();
const isActive = ref(false);
const theme = computed(() => isActive.value ? 'positive' : null);

async function toggleA11y() {
  try {
    const response = await api.post('accessibility-check/toggle');
    isActive.value = response.mode;
  } catch (error) {
    panel.error("Could not toggle accessibility check");
  }
}

async function open() {
  if (!isActive.value) {
    await toggleA11y();
  }
  const previewUrl = panel.view.props.model.previewUrl;
  window.open(previewUrl, '_blank');
}

async function init() {
  try {
    const session = await api.get('accessibility-check/status');
    isActive.value = Boolean(session.mode);
  } catch (error) { }
}

init();

function toggle() {
  dropdownContent.value?.toggle();
}
</script>

<template>
  <div>
    <k-button :dropdown="true" icon="accessibility" :theme="theme" variant="filled" size="sm"
      :title="panel.t('femundfilou.accessibility-check.buttons.toggle')" @click="toggle()"></k-button>
    <k-dropdown-content ref="dropdownContent" align-x="end">
      <k-dropdown-item :icon="isActive ? 'circle-outline' : 'circle-filled'" @click="toggleA11y">
        {{ isActive ? panel.t('femundfilou.accessibility-check.buttons.disable') :
          panel.t('femundfilou.accessibility-check.buttons.enable') }}
      </k-dropdown-item>
      <k-dropdown-item icon="open" @click="open()">
        {{ panel.t('femundfilou.accessibility-check.buttons.open') }}
      </k-dropdown-item>
    </k-dropdown-content>
  </div>
</template>
