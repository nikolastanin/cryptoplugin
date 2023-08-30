    Alpine.data('app', () => ({
    isTab1Visible: true,
        name : 'nikola',
    toggleTab() {
    this.isTab1Visible = !this.isTab1Visible;
},
    showTab2() {
    if (!this.isTab1Visible) {
    this.$nextTick(() => {
    this.isTab1Visible = false;
});
}
},
}));
