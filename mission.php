<?php
function dispatchCooling(array $commands): void {
    echo "=== 第3原子炉 冷却管制室 ===\n";
    usleep(500000);

    $coolant = false;
    $gas = false;

    foreach ($commands as $cmd) {
        switch ($cmd) {
            // ==========================================
            // 【指示】下の case "WAIT": 行を自分の case を追加せよ！
            // 担当A: case "WATER_INJECT": $coolant = true; break;
            // 担当B: case "NITROGEN_BLAST": $gas = true; break;
            case "WAIT": break; // ← これは残す
            case "WATER_INJECT": $coolant = true; break;
            case "NITROGEN_BLAST": $gas = true; break;
            // ==========================================
        }
    }

    if ($coolant && $gas) {
        echo "❄️ 【安定完了】注水と窒素噴射が同時成功！炉心温度が急速低下！\n";
    } else {
        echo "🔥 【臨界寸前】冷却手順が足りません。(水:" . ($coolant ? "○" : "×") . ", 窒素:" . ($gas ? "○" : "×") . ")\n";
        exit(1);
    }
}
dispatchCooling(["WATER_INJECT", "NITROGEN_BLAST"]);
