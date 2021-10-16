<template>
    <div class="flex-row-auto offcanvas-mobile w-200px w-xl-250px" id="kt_chat_aside">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Body-->
            <div class="card-body list">
                <!--begin:Search-->
                <div class="input-group input-group-solid">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> </span>
                    </div>
                    <input type="text" class="form-control py-4 h-auto" placeholder="Liste des clients">
                </div>
                <!--end:Search-->

                <!--begin:Users-->
                <div class="mt-7 scroll scroll-pull ps ps--active-y" style="height: 413px; overflow: hidden;">

                    <!--begin:User-->
                        <div v-for="(contact,index) in contacts" :key="contact.id" @click="selectContact(index,contact)" :class="{'selected':index == selected}">
                            <span v-if="contact.statut_client == 0">
                                <button class="d-flex align-items-center justify-content-between mb-2" style="border: none; background: none;width: 100%;">
                                    <div class="d-flex align-items-center" style="width: 100%; background: #ffc4c7; padding: 10px; border-radius: 5px;">
                                        <div class="d-flex flex-column">
                                            <div class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" style="font-size: 0.8em;">{{contact.name }}|
                                                <!-- <span class="font-weight-bold" id="kt_dashboard_daterangepicker_date"><time>00:00:00</time> </span> -->

                                                <span class="text-muted font-weight-bold font-size-sm">{{contact.name_agent}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </span>
                            <span v-else-if="contact.statut_client == 1">
                                <button class="d-flex align-items-center justify-content-between mb-2" style="border: none; background: none;width: 100%;">
                                        <div class= "d-flex align-items-center" style="width: 100%; background: #ffedc4; padding: 10px; border-radius: 5px;">
                                        <div class="d-flex flex-column">
                                            <div class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" style="font-size: 0.8em;">{{contact.name }} |
                                                <!-- <span class="font-weight-bold" id="kt_dashboard_daterangepicker_date"><time>00:00:00</time> </span> -->
                                                <span class="text-muted font-weight-bold font-size-sm">{{contact.name_agent}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </span>
                            <span v-else-if="contact.statut_client == 2">
                                <button class="d-flex align-items-center justify-content-between mb-2" style="border: none; background: none;width: 100%;" >
                                        <div class= "d-flex align-items-center" style="width: 100%; background: #c4ffc6; padding: 10px; border-radius: 5px;">
                                        <div class="d-flex flex-column">
                                            <div class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" style="font-size: 0.8em;">{{contact.name }}|
                                                <span class="text-muted font-weight-bold font-size-sm">{{contact.name_agent}}</span>
                                                <!-- <span class="font-weight-bold" id="kt_dashboard_daterangepicker_date"><time>00:00:00</time> </span> -->


                                                 </div>

                                        </div>
                                    </div>
                                </button>
                            </span>
                        </div>
                    <!--end:User-->


                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 413px; right: -2px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 164px;"></div>
                    </div>
                </div>
                <!--end:Users-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
</template>
<script >
    export default {
        props:{
            contacts:{
                type: Array,
                default:[]

            }
        },

        data() {
            return {

                selected : 0
            };
        },
        methods:{
            selectContact(index,contact){
                this.selected = index;
                this.$emit('selected',contact);
            }
        }

    }

</script>
<style >

.list{
    height: 68vh;
}

</style>

