#ifndef UPDATE_H
#define UPDATE_H

#include <QMainWindow>
#include <QMessageBox>
#include <QTableWidgetItem>
#include <QtSql>
#include <QSqlDatabase>
#include <QSqlQuery>
#include <QDebug>

namespace Ui {
class update;
}

class update : public QMainWindow
{
    Q_OBJECT

public:
    explicit update(QWidget *parent = nullptr);
    ~update();

private slots:
    void on_actualizar_clicked();

    void on_buscar_clicked();

private:
    Ui::update *ui;
    QSqlDatabase db;
    int currentIndex = 0;
    int id = 0;
};

#endif // UPDATE_H
