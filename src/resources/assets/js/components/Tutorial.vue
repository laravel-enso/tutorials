<template>
	<i class="pull-right fa fa-question"
		style="cursor: pointer;"
		@click="restart()">
	</i>
</template>

<script>

	var tutorialTemplate = '\
  	<div class="popover tour">\
		<div class="arrow"></div>\
		<p class="popover-title"></p>\
		<div class="popover-content"></div>\
		<div class="popover-navigation">\
			<button class="btn" data-role="prev">\
				<i class="fa fa fa-step-backward"></i>\
			</button>\
			<button class="btn" data-role="next">\
				<i class="fa fa-step-forward"></i>\
			</button>\
			<button class="btn margin-left-xs pull-right" data-role="end">\
				<i class="fa fa-stop"></i>\
			</button>\
		</div>\
	</div>\
	';

	export default {

		props: {
			route: {
				type: String,
				required: true
			}
		},

		data() {
			return {
				template: tutorialTemplate,
				tutorialSteps: [],
				firstTime: false,
				tour: null
			}
		},

		methods: {
			get() {
				axios.get('/system/tutorials/getTutorial/' + this.route).then(response => {
					this.tutorialSteps = response.data;
					this.init();

					return this.firstTime ? this.tour.start() : this.tour.restart();
			    }).catch(error => {
		    		if (error.response.data.level) {
		    			toastr[error.response.data.level](error.response.data.message);
		    		}
		    	});
			},
			init() {
				let self = this;

				this.tour = new Tour({
		            backdrop: true,
		            template: self.template
		        });

		        this.tour.addSteps(self.tutorialSteps);
			},
			restart() {
				return this.tour ? this.tour.restart() : this.get();
			},
		    isFirstTimeOnRoute() {
		    	return document.cookie.indexOf("tour_end") == -1;
		    }
		},

		mounted() {
			this.firstTime = this.isFirstTimeOnRoute();

			if (this.firstTime) {
				this.get();
			}
		}
	 }

</script>