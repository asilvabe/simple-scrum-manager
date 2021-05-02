export default {
    methods: {
        commarize(number, min) {
            min = min || 1e3;
            if (number >= min) {
                let units = ["k", "M", "B", "T"];
                let order = Math.floor(Math.log(number) / Math.log(1000));
                let unitName = units[order - 1];
                let num = Number((number / 1000 ** order).toFixed(2));
                return num + unitName;
            }

            return number.toLocaleString();
        }
    }
}


