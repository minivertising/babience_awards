<?php

namespace Kendo\Dataviz\UI;

class ChartSeriesDefaultsLabelsFromPadding extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The bottom padding of the from labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartSeriesDefaultsLabelsFromPadding
    */
    public function bottom($value) {
        return $this->setProperty('bottom', $value);
    }

    /**
    * The left padding of the from labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartSeriesDefaultsLabelsFromPadding
    */
    public function left($value) {
        return $this->setProperty('left', $value);
    }

    /**
    * The right padding of the from labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartSeriesDefaultsLabelsFromPadding
    */
    public function right($value) {
        return $this->setProperty('right', $value);
    }

    /**
    * The top padding of the from labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartSeriesDefaultsLabelsFromPadding
    */
    public function top($value) {
        return $this->setProperty('top', $value);
    }

//<< Properties
}

?>
