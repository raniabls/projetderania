<script setup>
import {ref , computed} from 'vue'

const props =  defineProps({
    maxValue: { type : Number, default:100 },
    modelValue: { type : Number, default:0 },
});

const percent = computed(() => {
  return (props.modelValue * 100) / props.maxValue;
})
</script>

<template> 
  <div id="progress" :data-max="`${maxValue}`" :data-min="0">
     <div id="bar" :style="`width:${percent}%`" :data-value="`${modelValue}%`"> </div>
</div>

</template>

<style lang="scss" scooped>
#progress{
    width: 500px;
    height: 5px;
    background-color:#ddd ;
    border-radius: 5px;
    position: relative;
    &::before{
        content: attr(data-min);
        position: absolute;
        bottom: 100%;
        left: 0;
    }
    &::after{
        content: attr(data-max);
        position: absolute;
        bottom: 100%;
        right: 0;
    }
#bar{
    width: 44%;
    height: 5px;
    background-color:tomato ;
    border-radius: 5px;
    transition: 0,25s all ease;
    position: relative;
    &::before{
        content: attr(data-value);
        position: absolute;
        bottom: 100%;
        right: 0;
    }

}
}
</style>